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

    public function getClients()
    {
       $date = date('Y-m-d');
        // $date = date('2020-01-19');
       $date = strtotime($date);
       $data = array();
        for($i = 1; $i <= 7; $i++)
            {
                $startDate = date('Y-m-d', $date - $i*86400);
                $data['date'][$i] = $startDate;
                $data['data'][$i] = $this->where('created_at', 'like', $startDate.'%')->get()->count('*');
            }
        return $data;
    }
}
