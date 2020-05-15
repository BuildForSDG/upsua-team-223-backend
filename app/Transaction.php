<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_code','type','amount','post_balance','iso_4217_currency_code','description',
    ];
}
