<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Auth;

class VideoController extends Controller
{
    
    public function index()
    {
        if (Auth::check()) {
            $videos =  Video::all();
            return view('Videos.index', ['videos' => $videos]);
        } 
        return redirect()->route('login');
    }

    
    public function create()
    {
        if (Auth::check()) {
            return view('Videos.create');
        } 
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        $file = $request->file('video');
        $name = $file->getClientOriginalName();
            if($file->move('videos/', $name)){
                if( Video::create([
                'video' => $name
            ])){
                     return redirect()->route('video');
                }
                return "Error";
        }
        return "Error";
    }


    public function destroy($id)
    {
        if (Auth::check()) {
            $v = Video::find($id);
        if (unlink('videos/'.$v->video)) {
            if(Video::where('id', $id)->delete()){
                return redirect()->route('video');
            }
        }
        }
        return redirect()->route('login');
    }
}
