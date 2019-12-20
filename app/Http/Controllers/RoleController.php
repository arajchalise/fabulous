<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function store()
    {
        return Role::create([
            'name' => 'Unverified',
            'level'=> 0
        ]);
    }
}
