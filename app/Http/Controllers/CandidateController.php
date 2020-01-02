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

        if (isset($request->id)) {
            $id = $request->id;
        } else {
            $id = 1;
        }

        if($file->move('candidateCv/', $name.".".$ext)){
            try {
                Candidate::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'cv' => $name.".".$ext,
                'career_id' => $id,
                'status' => 0
            ]);
                $request->session()->put('message', 'Your application is sent, We will get back to you asap');
                return redirect()->route('career'); 
            } catch (\Illuminate\Database\QueryException $e) {
                 $request->session()->put('message', 'Something went wrong, Please try again later');
                unlink('candidateCv/'.$name.".".$ext);
                return redirect()->route('career');
                //die('OK');
            }
            // if(Candidate::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'address' => $request->address,
            //     'phone' => $request->phone,
            //     'cv' => $name.".".$ext,
            //     'career_id' => $id,
            //     'status' => 0
            // ])){
            //     $request->session()->put('message', 'Your application is sent, We will get back to you asap');
            //     return redirect()->route('career');
            // } else {
            //     $request->session()->put('message', 'Something went wrong, Please try again later');
            //     unlink('candidateCv/'.$name.".".$ext);
            //     return redirect()->route('career');
            // }
        }
        return "Error Uploading Files";
        
    }
}
