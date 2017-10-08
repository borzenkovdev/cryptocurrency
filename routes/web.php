<?php

Route::get('/', 'CurrencyController@index');

Route::get('/detail/{symbol}', 'CurrencyController@detail');

Route::get('/about', 'SiteController@about');

Route::get('/api/catalog', 'CurrencyController@catalog');

Route::get('/api/history', 'CurrencyController@history');

Route::get('/api_sources/', 'ApiSourceController@index');

Route::get('/types/', 'CurrencyTypeController@index');