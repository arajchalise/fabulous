<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;
use Auth;

class CareerController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $careers = Career::where('department_id', Auth::user()->department_id)->get();
            return view('Career.index', ['careers' => $careers]);
        } 
        return redirect()->route('login');
    }

    public function getCareer()
    {
        $careers = Career::all();
        return view('career', ['careers' => $careers]);
    }

    public function create()
    {
        if (Auth::check()) {
            return view('Career.create');
        }
        return redirect()->route('login');
    }

    public function edit(Career $career)
    {
         if (Auth::check()) {
             return view('Career.edit', ['career'=> Career::find($career->id)]);
        }
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        if(Career::create([
            'position' => $request->position,
            'description' => $request->description,
            'department_id' => Auth::user()->department_id

        ])){
            return redirect()->route('careers');
        }
        return "Error";
    }

    public function update(Request $request)
    {
        if (Career::where('id', $request->id)->update([
                'position' => $request->position,
                'description' => $request->description
        ])) {
            return redirect()->route('careers');
        }
        return "Error";
    }

    public function show()
    {
        if (Auth::check()) {
            $career = Career::with('candidate')->get();
            $c =  $career[0];
            return view('Career.show', ['career' => $c]);
        }
        return redirect()->route('login');
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            if (Career::where('id', $id)->delete()) {
                return redirect()->route('careers');
            }
            return "Errors";
        }
        return redirect()->route('login');
    }
}
