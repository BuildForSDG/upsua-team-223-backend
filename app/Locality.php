<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $fillable = [
        'subdivision','country_id','name',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
