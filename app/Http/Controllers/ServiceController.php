<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Auth;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::with('department')->get();
    }

    public function show(Service $service)
    {
        return Service::find($service->id);
    }

    public function create()
    {
        return view('Services.create');
    }

    public function edit(Service $service)
    {
        $serv = Service::find($service->id);
        return view('Services.edit', ['serv' => $serv]);
    }

    public function store(Request $request)
    {
        return Service::create([
            'type_of_service' => $request->name,
            'description' => $request->description,
            'department_id' => Auth::user()->department_id
        ]);
    }

    public function destroy($id)
    {
        return Service::where('id', '=', $id)->delete();
    }

    public function getServices()
    {
        $services = Service::all();
        return view('Services.index', ['services' => $services]);
    }
}
