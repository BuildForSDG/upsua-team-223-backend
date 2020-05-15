<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'code','name','currency','iso_4217_currency_code',
    ];
}
