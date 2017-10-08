<?php

namespace App\Http\Controllers;

use App\ApiSource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Currency;
use App\CurrencyType;
use App\CurrencyHistory;

class SiteController extends Controller
{
    public function about ()
    {
        return view('about');
    }
}
