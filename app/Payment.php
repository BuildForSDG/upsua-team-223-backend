<?php

namespace App;

use App\Http\Middleware\Partner;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name','description','payment_img','method_accepted','number','partner_account_id','locality_id',
    ];

    public function costs(){
        return $this->hasMany('App\\PaymentCost','payment_id','id');
        //return $this->hasMany(PaymentCost::class,'payment_id');
    }

    public function partner(){
        return $this->belongsTo(PartnerAccount::class,'partner_account_id');
    }

    public function locality(){
        return $this->belongsTo(Locality::class);
    }
}
