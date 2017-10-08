<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiSources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('api_source')->insert([
            'name' => 'coincap',
            'url' => 'http://coincap.io/page/{{symbol}}'
        ]);
        \DB::table('api_source')->insert([
            'name' => 'coinmarketcap',
            'url' => 'https://api.coinmarketcap.com/v1/ticker/{{name}}/'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
