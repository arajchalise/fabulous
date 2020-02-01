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
        'remarks',
        'rewards'
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

    public function getSales()
    {
       $date = date('Y-m-d');
        // $date = date('2020-01-21');
       $date = strtotime($date);
       $data = array();
        for($i = 1; $i <= 7; $i++)
            {
                $startDate = date('Y-m-d', $date - $i*86400);
                $data['date'][$i] = $startDate;
                $data['data'][$i] = $this->where('status', 3)->where('created_at', 'like', $startDate.'%')->get()->sum('total_amount');
            }
        return $data;
    }
}
