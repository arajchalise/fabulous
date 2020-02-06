<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPhoto extends Model
{
    protected $fillable = [
        'buyer_id',
        'photo',
        'type'
    ];

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }
}
