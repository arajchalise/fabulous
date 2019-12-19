<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function project()
    {
        return $this->hasMany('App\Project');
    }
}
