<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = ['buyer_id', 'rewards'];

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }
}
