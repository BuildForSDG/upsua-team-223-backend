<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicAccount extends Model
{
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
    public function business()
    {
        return $this->hasOne('App\BusinessAccount');
    }
}
