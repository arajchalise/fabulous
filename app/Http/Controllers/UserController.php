<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::with('role')->with('department')->get();
        return view('Users.index', ['users' => $users]);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $pass = $request->pass;
        if(Auth::attempt([
            'email' => $email,
            'password' => $pass 
        ])) {
            print "ok";
        } else {
            print "NOt ok";
        }
    }
}
