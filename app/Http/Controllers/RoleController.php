<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Auth;

class RoleController extends Controller
{
    public function store()
    {
        if (Auth::check()) {
            return Role::create([
            'name' => 'Unverified',
            'level'=> 0
            ]);
        } return redirect()->route('login');
    }
}
