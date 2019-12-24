<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'position',
        'description',
        'department_id'
    ];


    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function candidate()
    {
        return $this->hasMany('App\Candidate');
    }
}
