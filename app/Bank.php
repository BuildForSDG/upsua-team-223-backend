<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name','description','img','number','partner_account_id','locality_id',
    ];

    public function costs(){
        return $this->hasMany('App\\BankCost','bank_id','id');
    }

    public function partner(){
        return $this->belongsTo(PartnerAccount::class,'partner_account_id');
    }

    public function locality(){
        return $this->belongsTo(Locality::class);
    }
}
