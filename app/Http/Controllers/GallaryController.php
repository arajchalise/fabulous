<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallary;

class GallaryController extends Controller
{
    public function index()
    {
       $galleries = Gallary::all();
       return view('Gallery.index', ['galleries' => $galleries]);
    }

    public function show(Gallary $gallary)
    {
        return Gallary::find($gallary->id);
    }

    public function create()
    {
        return view('Gallery.create');
    }

    public function store(Request $request)
    {
            $file = $request->file('photo');
            $name = str_replace(" ", "_", $file->getClientOriginalName());
            $ext = $file->getClientOriginalExtension();
            if ($file->move("images/", $name.".".$ext)){
                return Gallary::create([
                    'photo' => $name,
                    'caption' => $request->caption
                ]);
            }
    }
}
