<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'department_id',
        'client_id',
        'photo',
        'location',
        'type',
        'system_used',
        'status'
    ];


    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
