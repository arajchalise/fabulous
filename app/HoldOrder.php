<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoldOrder extends Model
{
    protected $fillable = [
        'tnx_id', 'message'
    ];

    public function getCounts()
    {
        $data = $this->all();
        return $data->count();
    }

    public function getMessage($tnx_id)
    {
        $data = $this->where('tnx_id', $tnx_id)->get();
        return $data[0]->message;
    }
}
