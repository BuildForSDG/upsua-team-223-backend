<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
