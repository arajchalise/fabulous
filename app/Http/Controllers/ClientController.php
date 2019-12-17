<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function show(Client $client)
    {
        return Client::find($client->id);
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

    public function store()
    {
        return Client::create([
            'name' => 'ABC Enterprises',
            'logo' => 'logo.png'
        ]);
    }


    public function destroy($id)
    {
        return Client::where('id', '=', $id)->delete();
    }
}
