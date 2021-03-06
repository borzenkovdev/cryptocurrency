<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_history', function (Blueprint $table) {
            $table->engine = 'MyIsam';
            $table->increments('id');
            $table->decimal('price', 10, 3);
            $table->decimal('percent', 10, 3);
            $table->integer('currency_type_id');
            $table->integer('api_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_history');
    }
}
