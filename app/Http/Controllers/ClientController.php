<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Auth;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return $clients; 
    }
    public function allclients()
    {
        $clients = Client::with('department')->with('project')->get();
        return view('Clients.index', ['clients' => $clients]);
        //return $clients;
    }

    public function show(Client $client)
    {
        return Client::find($client->id);
    }

    public function create()
    {
        return view('Clients.create');
    }

    public function edit(Client $client)
    {
        $client = Client::find($client->id);
        return view('Client.edit', ['client' => $client]);
    }

    public function update()
    {
        return Client::where('id', '=', $request->id)
                        ->update([
                            'name' => 'ABC Enterprises',
                            'logo' => 'abc.png'
                        ]);
    }

    public function store(Request $request)
    {
        $file = $request->file('photo');
            $name = str_replace(" ", "_", $request->name);
            $ext = $file->getClientOriginalExtension();
            if ($file->move("images/", $name.".".$ext)){
                return Client::create([
                    'name' => $name,
                    'logo' => $name.".".$ext,
                    'department_id' => Auth::user()->department_id
                ]);
            }
    }


    public function destroy($id)
    {
        return Client::where('id', '=', $id)->delete();
    }
}
