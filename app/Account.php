<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'balance',
    ];
    public function transactions()
    {
        return $this->hasMany('App\\Transaction','account_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
