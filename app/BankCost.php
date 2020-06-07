<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankCost extends Model
{
    protected $fillable = [
        'min_val','max_val','amount','bank_id',
    ];

    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
