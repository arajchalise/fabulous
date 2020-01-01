<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;

class CandidateController extends Controller
{
    public function store( Request $request)
    {
        $file = $request->file('file');
        $name = str_replace(" ", "_", $request->name);
        $ext = $file->getClientOriginalExtension();

        if($file->move('candidateCv/', $name.".".$ext)){
            if(Candidate::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'cv' => $name.".".$ext,
                'career_id' => 1,
                'status' => 0
            ])){
                $request->session()->put('message', 'Your application is sent, We will get back to you asap');
                return redirect()->route('career');
            }
        }
        return "Error Uploading Files";
        
    }
}
