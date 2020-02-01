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
       if (Auth::check()) {
            $clients = Client::where('department_id', Auth::user()->department_id)
                            ->with('department')
                            ->with('project')
                            ->get();
        return view('Clients.index', ['clients' => $clients]);
       } else {
        return redirect()->route('login');
       }
        
    }

    public function create()
    {
        if(Auth::check()){
            return view('Clients.create');
        } else{
            return redirect()->route('login');
        }
    }

    public function edit(Client $client)
    {
        if (Auth::check()) {
            $client = Client::find($client->id);
            return view('Clients.edit', ['client' => $client]);
        } else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            if(Client::where('id', '=', $request->id)
                        ->update([
                            'name' => $request->name
                        ])){
            return redirect()->route('clients');
            } 
            return "Error Updating Detail";
        } return redirect()->route('login');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $file = $request->file('photo');
            $name = str_replace(" ", "_", $request->name);
            $ext = $file->getClientOriginalExtension();
            if ($file->move("images/clientImages", $name.".".$ext)){
                if( Client::create([
                    'name' => $request->name,
                    'logo' => $name.".".$ext,
                    'department_id' => Auth::user()->department_id
                ])){
                    return redirect()->route('clients');
                } else {
                    unlink('images/'.$name.".".$ext);
                    return "Error Storing values";
                }
            } 
            return "Error Uploading file";
        } return redirect()->route('login');
    }


    public function destroy($id)
    {
        if (Auth::check()) {
            $client = Client::find($id);
            if(unlink( 'images/clientImages'.$client->logo)){
                Client::where('id', '=', $id)->delete();
                return redirect()->route('clients');
            }
        return "Error";
        } else {

        }
    }
}
