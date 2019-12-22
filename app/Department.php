<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function project()
    {
        return $this->hasMany('App\Project');
    }

    public function client()
    {
        return $this->hasMany('App\Client');
    }

    public function service()
    {
        return $this->hasMany('App\Service');
    }
}
