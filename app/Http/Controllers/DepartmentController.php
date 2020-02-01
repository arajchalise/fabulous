<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Auth;

class DepartmentController extends Controller
{
    public function index()
       {
           $departments = Department::where('name', '!=', 'Unassigned')->get();
           return $departments;
       }
    public function alldepartments()
       {
           if (Auth::check()) {
              $departments = Department::where('id', Auth::user()->department_id)
                                      ->with('project')
                                      ->with('client')
                                      ->get();
              return view('Departments.index', ['departments' => $departments]);
           } else {
              return redirect()->route('login');
           }
       }

    public function store(Request $request)
       {
            if (Auth::check()) {
              if( Department::create([
                'name' => $request->name,
                'description' => $request->description
              ])){
                return redirect()->route('departments');
              }
              return "Error";
            } return redirect()->route('login');
       }

    public function create()
       {
           if (Auth::check()) {
              return view('Departments.create');
           } else {
              return redirect()->route('login');
           }
       }

    public function edit(Department $department)
       {
            if (Auth::check()) {
              $dept = Department::find($department->id);
              return view('Departments.edit', ['department' => $dept]);
           } else {
              return redirect()->route('login');
           }
       }

    public function update(Request $request)
       {
            if (Auth::check()) {
                if(Department::where('id', '=', $request->id)
                                ->update([
                                    'name' => $request->name,
                                    'description' => $request->description
                                ])){
                return redirect()->route('departments');
              }
              return "Error"; 
            } return redirect()->route('login'); 
       }

    public function destroy($id)
       {
            if (Auth::check()) {
                if (Department::where('id', '=', $id)->delete())
            {
              return redirect()->route('departments');
            }
            return "Error"; 
            } else {
              return redirect()->route('login');
            }

       }   
}
