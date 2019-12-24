<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKController extends Controller
{
    public function upload(Request $request)
    {
       echo "<script> alert(".$request->file('upload')->getClientsOriginalName();.");</script>";

    }
}
