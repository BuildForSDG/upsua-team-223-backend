<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use Messagable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token','country_id','phone','userable_type','userable_id','code',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @Single Table Inheritance, polymorphic relationships
     */

    public function userable()
    {
        return $this->morphTo();
    }
    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function type()
    {
        if ($this->userable_type=="App\\BasicAccount") {
            return 'basic';
        } elseif ($this->userable_type=="App\\AdminAccount") {
            return 'admin';
        } elseif ($this->userable_type=="App\\BusinessAccount") {
            return 'business';
        } else {
            return 'partner';
        }
    }
}
