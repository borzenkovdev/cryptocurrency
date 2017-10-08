<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Currency;
use App\CurrencyHistory;

class CurrencyType extends Model
{
    protected $table = 'currency_type';

    public function currencies()
    {
        return $this->hasMany(Currency::class, 'currency_type_id', 'id');
    }

    public function history()
    {
        return $this->hasMany(CurrencyHistory::class, 'currency_type_id', 'id');
    }
}
