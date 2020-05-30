<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCost extends Model
{
    protected $fillable = [
        'type','min_val','max_val','amount','payment_id',
    ];

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
