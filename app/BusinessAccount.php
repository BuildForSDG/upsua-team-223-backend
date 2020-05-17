<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessAccount extends Model
{
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
    public function basic()
    {
        return $this->belongsTo(BasicAccount::class);
    }
    public function partner()
    {
        return $this->hasOne(PartnerAccount::class);
    }
}
