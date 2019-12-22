<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function index()
       {
           $departments = Department::where('name', '!=', 'Unassigned')->get();
           //return view('Department.index', ['departments' => $departments]);
           return $departments;
       }
    public function alldepartments()
       {
           $departments = Department::with('project')
                                      ->with('client')->get();
           // return $departments;
           return view('Department.index', ['departments' => $departments]);
           // return $departments;
       }

    public function show(Department $department)
       {
           return Department::find($department->id);
       }

    public function store()
       {
            return Department::create([
                'name' => 'Unassigned',
                'description' => 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other.'
            ]);
       }

    public function create()
       {
           return view('Department.create');
       }

    public function edit(Department $department)
       {
            $dept = Department::find($department->id);
            return view('Department.edit');
       }

    public function update()
       {
            return Department::where('id', '=', $request->id)
                                ->update([
                                    'name' => $request->name,
                                    'description' => $request->description
                                ]);   
       }

    public function destroy($id)
       {
            return Department::where('id', '=', $id)->delete();   
       }   
}
