<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerAccount extends Model
{
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
    public function business()
    {
        return $this->belongsTo('BusinessAccount');
    }
}
