<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Auth;

class ServiceController extends Controller
{
    
    public function index()
    {
        $services = Service::with('department')->get();
        //return $services;
        return view('services', ['services' => $services]);
    }

    public function show(Service $service)
    {
        return Service::find($service->id);
    }

    public function create()
    {
        if (Auth::check()) {
            return view('Services.create');
        } else {
            return redirect()->route('login');
        }
    }

    public function edit(Service $service)
    {
        if (Auth::check()) {
            $serv = Service::find($service->id);
            return view('Services.edit', ['serv' => $serv]);
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        if( Service::create([
            'type_of_service' => $request->name,
            'description' => $request->description,
            'department_id' => Auth::user()->department_id
        ])){
            return redirect()->route('service');
        }
        return "Error";
    }

    public function update(Request $request)
    {
        if (Service::where('id', $request->id)->update([
                'type_of_service' => $request->name,
                'description' => $request->description
        ])) {
            return redirect()->route('service');
        }
        return "Error";
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            if(Service::where('id', '=', $id)->delete()){
            return redirect()->route('service');
        }
        return "Error";
        } else {
            return redirect()->route('login');
        }
    }

    public function getServices()
    {
        if (Auth::check()) {
           $services = Service::where('department_id', Auth::user()->department_id)
                            ->get();
            return view('Services.index', ['services' => $services]); 
        } else {
            return redirect()->route('login');
        }
    }
}
