<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = ['buyer_id', 'rewards'];

    

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }

    public function getReward()
    {
        $reward = $this->where('buyer_id', Auth::guard('buyer')->user()->id)->get();
        if (sizeof($reward) == 0) {
            return 0;
        }
        return $reward[0]->rewards;
    }
}
