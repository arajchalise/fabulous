<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Buyer extends Authenticatable
{
    protected $guard = 'buyer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                        'first_name',
                        'last_name',
                        'address',
                        'contact_no',
                        'office_name', 
                        'office_type', 
                        'office_pan', 
                        'email', 
                        'password', 
                        'contact_type', 
                        'email_type', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
   }
