<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'level'
    ];

    public function user($value='')
    {
        return $this->belongsTo('App\User');
    }
}
