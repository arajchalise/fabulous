<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'dept_id',
        'type_of_service',
        'description'
    ];
}
