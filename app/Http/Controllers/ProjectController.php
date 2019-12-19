<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

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

    public function store()
    {
        return Project::create([
            'name' => 'asfdf',
            'description' => 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other.',
            'photo' => 'projet.jpg',
            'department_id' => 1,
            'client_id' => 1
        ]);
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
