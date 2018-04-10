<?php

namespace Thd;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'alt_email',
        'last_name',
        'company',
        'phone',
        'alt_phone',
        'mob_phone',
        'fax',
        'zip',
        'country',
        'state',
        'city',
        'address_1',
        'address_2'
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
     *
     * Get the house plans for the user.
     *
     */
    public function plans()
    {
        return $this->hasMany('Thd\Plan');
    }
}
