<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'balance',
    ];
    public function transactions(){
        $this->hasMany(Transaction::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
