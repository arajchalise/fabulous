<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'cv',
        'career_id'
    ];

    public function career()
    {
        return $this->belongsTo('App\Career');
    }
}
