<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallary;

class GallaryController extends Controller
{
    public function index()
    {
       return Gallary::all();
    }

    public function show(Gallary $gallary)
    {
        return Gallary::find($gallary->id);
    }

    public function store()
    {
        return Gallary::create([
            'photo' => ''
        ]);
    }
}
