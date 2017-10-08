<?php

namespace App\Http\Controllers;

use App\ApiSource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Currency;
use App\CurrencyType;
use App\CurrencyHistory;

class CurrencyController extends Controller
{
    public function index ()
    {
        return view('index');
    }

    public function detail ($symbol)
    {
        $type = CurrencyType::where('symbol', $symbol)->first();

        return view('detail', compact('type'));
    }

    /**
     * @param Request $request
     * @param Currency $currency
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function catalog (Request $request, Currency $currency)
    {
        $query = $currency->newQuery();

        //напрямую потому что laravel сочтёт эту куку невалидной
        $api = isset($_COOKIE['api_id']) ? $_COOKIE['api_id'] : ApiSource::all()->first()->id;
        $query->where('api_id', $api);


        if ($request->has('filter')) {
            $filter = JSON_DECODE($request->input('filter'), true);
            if (! empty($filter) && strlen($filter['name']) > 0 ) {
                $query->whereHas('currencyType', function ($query) use ($filter) {
                    $query->where('name', 'LIKE', '%' . $filter['name'] .'%');
                });
            }
        }

        if ($request->has('limit')) {
            $take = $request->input('limit');
        } else {
            $take = 10;
        }

        if ($request->has('page') && $request->has('limit')) {
            $page = $request->input('page');
            if ($page > 1) {
                $skip = $request->input('limit') * ($page - 1);
            } else {
                $skip = 0;
            }
        } else {
            $skip = 0;
        }

        if ($request->has('order')) {
            $orderString = $request->input('order');
            $orderField = substr($orderString, 1);
            $orderSymbol = substr($orderString, 0, 1);
            $orderSymbol = ($orderSymbol == '+') ? 'ASC' : 'DESC';
            $query->orderBy($orderField, $orderSymbol);
        } else {
            $query->orderBy('percent', 'DESC');
        }

        if ($request->has('limit')) {
            $query->paginate($request->input('limit'));
        }
        $query->with('currencyType');
        $query->take($take)->skip($skip);

        $count = Currency::where('api_id', $api)->count();

        return JSON_ENCODE([
            'count' => $count,
            'rows' => $query->get()
        ]);
    }

    /**
     * @param Request $request
     * @param CurrencyHistory $currency_history
     * @return bool|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function history (Request $request, CurrencyHistory $CurrencyHistory)
    {
        //todo не надёжно - исправить
        $referrer = $request->headers->get('referer');
        $referrer = stripslashes($referrer);
        $referrer = htmlentities($referrer);
        $referrerPieces = explode('/', $referrer);
        $symbol = $referrerPieces[4];

        if (! $symbol) {
            return false;
        }

        if ($request->has('limit')) {
            $take = $request->input('limit');
        } else {
            $take = 10;
        }

        if ($request->has('page') && $request->has('limit')) {
            $page = $request->input('page');
            if ($page > 1) {
                $skip = $request->input('limit') * ($page - 1);
            } else {
                $skip = 0;
            }
        } else {
            $skip = 0;
        }

        $currencyType = CurrencyType::where('symbol', $symbol)->first();
        if (! $currencyType) {
            return false;
        }

        $query = $CurrencyHistory->newQuery();

        //напрямую потому что laravel сочтёт эту куку невалидной
        $api = isset($_COOKIE['api_id']) ? $_COOKIE['api_id'] : ApiSource::all()->first()->id;
        $query->where('api_id', $api);
        $query->where('currency_type_id', $currencyType->id);
        $query->orderBy('created_at', 'DESC');
        $query->with('currencyType');
        $query->take($take)->skip($skip);
        $count = CurrencyHistory::where('currency_type_id', $currencyType->id)->where('api_id', $api)->count();

        return JSON_ENCODE([
            'count' => $count,
            'rows' => $query->get()
        ]);
    }
}
