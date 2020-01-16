<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = [
        'product_id',
        'photo'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
