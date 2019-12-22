<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'department_id',
        'type_of_service',
        'description'
    ];


    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
