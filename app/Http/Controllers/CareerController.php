<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;
use Auth;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        return view('Career.index', ['careers' => $careers]);
    }

    public function getCareer()
    {
        return view('career');
    }

    public function create()
    {
        return view('Career.create');
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

    public function show()
    {
        $career = Career::with('candidate')->get();
        $c =  $career[0];
        return view('Career.show', ['career' => $c]);
    }
}
