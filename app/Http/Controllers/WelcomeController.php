<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Project;
use App\Department;
use App\Video;
use DB;

class WelcomeController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();
            $clients = Client::all();
            $departments = Department::where('name', '!=', 'Unassigned')->get();
            $projects = Project::where('status', 0)->orderBy('updated_at', 'DESC')->limit(8)->get();
            $video = Video::latest('updated_at')->first();

            $data = ['clients' => $clients, 'departments' => $departments, 'projects' => $projects, 'video' => $video];
            return view('welcome', ['data'=> $data]);
        } catch (\PDOException $e) {
            die ("Server Error, Please try again leter");
        }
    }
}
