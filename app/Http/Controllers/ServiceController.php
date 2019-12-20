<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }

    public function show(Service $service)
    {
        return Service::find($service->id);
    }

    public function edit(Service $service)
    {
        $serv = Service::find($service->id);
        return view('Services.edit', ['serv' => $serv]);
    }

    public function store()
    {
        return Service::create([
            'dept_id' => 1,
            'type_of_service',
            'description' => 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other.'
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
