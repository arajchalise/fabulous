<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallary;
use Auth;

class GallaryController extends Controller
{
    public function index()
    {
       if (Auth::check()) {
           $galleries = Gallary::all();
            return view('Gallery.index', ['galleries' => $galleries]);
       } else {
            return redirect()->route('login');
       }
    }

    public function getGallary()
    {
        $galleries = Gallary::all();
        return view('gallary', ['galleries' => $galleries]);
    }

    public function show(Gallary $gallary)
    {
        return Gallary::find($gallary->id);
    }

    public function create()
    {
        if (Auth::check()) {
            return view('Gallery.create');
        } else {
            return redirect()->route('login');
        }
    }

    public function edit(Gallary $gallary)
    {
        if (Auth::check()) {
            $gallary = Gallary::find($gallary->id);
            return view('Gallery.edit', ['gallery' => $gallary]); 
        } else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request)
    {
        if(Gallary::where('id', $request->id)->update([
            'caption' => $request->caption
        ])) {
            return redirect()->route('gallery');
        }
        return "Error";
    }

    public function store(Request $request)
    {
            $file = $request->file('photo');
            $name = str_replace(" ", "_", $file->getClientOriginalName());
            $ext = $file->getClientOriginalExtension();
            if ($file->move("images/galleryImages", $name)){
                if( Gallary::create([
                    'photo' => $name,
                    'caption' => $request->caption
                ])){
                    return redirect()->route('gallery');
                }
            }
    }

    public function destroy($id)
    {
       if (Auth::check()) {
             $gallary = Gallary::find($id);
            if (unlink('images/galleryImages/'.$gallary->photo)) {
                if(Gallary::where('id', $id)->delete()){
                return redirect()->route('gallery');
            }
            return "Error";        
        }
       } else {
            return redirect()->route('login');
       }
    }
}
