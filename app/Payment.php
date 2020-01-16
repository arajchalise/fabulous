<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [ 'tnx_id', 'photo'];

    public function getPaymentSlip($txn)
    {
        return $this->where('tnx_id', $txn)->get();
    }
}
