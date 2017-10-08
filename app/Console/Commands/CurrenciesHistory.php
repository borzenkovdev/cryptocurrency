<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CurrencyType;
use App\CurrencyHistory;
use App\ApiSource;
use GuzzleHttp;
use App\Helpers\ApiHelper;
use Illuminate\Support\Facades\Log;

class CurrenciesHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command add record to table currency_history. Recommended execute every 30 minutes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle ()
    {
        $client = new GuzzleHttp\Client();

        $allCurrencies = CurrencyType::all();
        $allApiSrc = ApiSource::all();

        foreach($allApiSrc as $currentApi) {
            foreach($allCurrencies as $currency) {
                $api_url = str_replace("{{name}}", $currency->name, $currentApi->url);
                $api_url = str_replace("{{symbol}}", $currency->symbol, $api_url);
                $res = $client->request('GET', $api_url, ['verify' => false]);
                if ($res->getStatusCode() == 200) {
                    $responseJson = JSON_DECODE($res->getBody(), true);
                    $responseFormatted = ApiHelper::parseJsonResponse($responseJson, $currentApi->name);

                    $curr = new CurrencyHistory;
                    $curr->price = $responseFormatted['price'];
                    $curr->percent = $responseFormatted['percent'];
                    $curr->api_id = $currentApi->id;
                    $curr->currency_type_id = $currency->id;
                    $curr->save();
                } else {
                    Log::error('Error with api  '. $currentApi->url);
                }
            }
        }
    }


}
