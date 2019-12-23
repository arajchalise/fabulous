<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Project;
use App\Department;
use App\Video;

class WelcomeController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $departments = Department::where('name', '!=', 'Unassigned')->get();
        $projects = Project::orderBy('id', 'DESC')->limit(6)->get();
        $video = Video::latest('created_at')->first();

        $data = ['clients' => $clients, 'departments' => $departments, 'projects' => $projects, 'video' => $video];
        return view('welcome', ['data'=> $data]);
    }
}
