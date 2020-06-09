<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceCost extends Model
{
    protected $fillable = [
        'min_val','max_val','amount','finance_id',
    ];

    public function finance(){
        return $this->belongsTo(Finance::class);
    }
}
