<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'buyer_id',
        'receipent_name',
        'receipent_contact',
        'receipent_email',
        'shipping_address',
        'qty',
        'total_amount',
        'status',
        'remarks'
    ];

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }


    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function getCounts()
    {
        $data = $this->where('status', 0)->get()->unique('remarks');
        return $data->count();
    }

    public function getAppCounts()
    {
        $data = $this->where('status', 1)->get()->unique('remarks');
        return $data->count();
    }

     public function getPaidCounts()
    {
        $data = $this->where('status', 2)->get()->unique('remarks');
        return $data->count();
    }
}
