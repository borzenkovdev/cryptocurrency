<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyHistory extends Model
{
    protected $table = 'currency_history';

    public function currencyType()
    {
        return $this->belongsTo(CurrencyType::class);
    }
}
