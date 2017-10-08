<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CurrencyType;

class Currency extends Model
{
    protected $table = 'currency';

    public function currencyType()
    {
        return $this->belongsTo(CurrencyType::class);
    }
}
