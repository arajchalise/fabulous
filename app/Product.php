<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'brand_name',
        'description',
        'price',
        'stock',
        'rewards',
        'category_id'
    ];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function photos()
    {
        return $this->hasMany('App\ProductPhoto');
    }

}
