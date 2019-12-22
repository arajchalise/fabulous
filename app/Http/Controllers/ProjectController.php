<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Client;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects =  Project::with('department')
                             ->with('client')->get();
        // return $projects;
        return view('Projects.index', ['projects' => $projects]);
    }

    public function show(Project $project)
    {
        return Project::find($project->id);
    }

    public function create()
    {
        $clients = Client::all();
        return view('Projects.create', ['clients' => $clients]);
    }

    public function store(Request $request)
    {
        $file = $request->file('photo');
        $name = str_replace(" ", "_", $request->pname);
        $ext = $file->getClientOriginalExtension();
        if($file->move('/projectImages', $name.".".$ext)){
            return Project::create([
                'name' => $request->pname,
                'description' => $request->description,
                'photo' => $name.".".$ext,
                'client_id' => $request->cid,
                'department_id' => Auth::user()->department_id
            ]);

        }
    }

    public function update()
    {
        return Project::where('id', '=', $request->id)
                        ->update([]);
    }

    public function destroy($id)
    {
        return Project::where('id', '=', $id)->delete();
    }
}
