<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        \DB::table('currency_type')->insert([
            'name' => 'Bitcoin',
            'symbol' => 'BTC'
        ]);
        \DB::table('currency_type')->insert([
            'name' => 'Ethereum',
            'symbol' => 'ETH'
        ]);
        \DB::table('currency_type')->insert([
            'name' => 'Ripple',
            'symbol' => 'XRP'
        ]);
        \DB::table('currency_type')->insert([
            'name' => 'Litecoin',
            'symbol' => 'LTC'
        ]);
        \DB::table('currency_type')->insert([
            'name' => 'NEO',
            'symbol' => 'NEO'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        return true;
    }
}
