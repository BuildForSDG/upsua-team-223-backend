<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherServiceCost extends Model
{
    protected $fillable = [
        'min_val','max_val','amount','other_service_id',
    ];

    public function otherService(){
        return $this->belongsTo(OtherService::class);
    }
}
