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
        if (Auth::check()) {
            $projects =  Project::where('department_id', Auth::user()->department_id)
                             ->with('department')
                             ->with('client')
                             ->orderBy('updated_at', 'DESC')->get();
            return view('Projects.index', ['projects' => $projects]);
        } else {
            return redirect()->route('login');
        }
    }

    public function getProjects()
    {
        $projects = Project::orderBy('id', 'DESC')->paginate(9);
        return view('project', ['projects' => $projects]);
    }

    public function show(Project $project)
    {
        $project =  Project::find($project->id);
        return view('Projects.show', ['project' => $project]);
    }

    public function create()
    {
        if (Auth::check()) {
                    $clients = Client::where('department_id', Auth::user()->department_id)->get();
                    return view('Projects.create', ['clients' => $clients]);
        } else {
            return redirect()->route('login');
        }
    }

    public function edit(Project $project)
    {
        if (Auth::check()) {
            $Project = Project::find($project->id);
            return view('Projects.edit', ['project' => $Project]);
        
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $file = $request->file('photo');
        $name = str_replace(" ", "_", $request->pname);
        $ext = $file->getClientOriginalExtension();
        if($file->move('images/projectImages', $name.".".$ext)){
            if(Project::create([
                'name' => $request->pname,
                'description' => $request->description,
                'photo' => $name.".".$ext,
                'client_id' => $request->cid,
                'department_id' => Auth::user()->department_id,
                'location' => $request->location,
                'type' => $request->type,
                'system_used' => $request->system_used,
                'status' => $request->status
            ])){
                return redirect()->route('projects');
            } else {
                return "Error storing value";
            }

        }
    }

    public function update(Request $request)
    {
        if( Project::where('id', $request->id)
                        ->update([
                            'name' => $request->pname,
                            'description' => $request->description,
                            'location' => $request->location,
                            'type' => $request->type,
                            'system_used' => $request->system_used,
                            'status' => $request->status

                        ])){
            return redirect()->route('projects');
        }
        return "Error updating data";
            
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            $project = Project::find($id);
            if(unlink('images/projectImages/'.$project->photo)){
                Project::where('id', '=', $id)->delete();
                    return redirect()->route('projects');
             
            } else {
                return "Error Deleteing project";
            }
        } else {
            return redirect()->route('login');
        }
    }
}
