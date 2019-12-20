<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = [
        'submenu_name',
        'url',
        'menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
