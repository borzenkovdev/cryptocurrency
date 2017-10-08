<?php

namespace App\Http\Controllers;

use App\ApiSource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Currency;
use App\CurrencyHistory;

class ApiSourceController extends Controller
{
    public function index ()
    {
        return view('api_sources');
    }
}
