<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;
use App\Role;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $id = Auth::user()->department_id;
            $users =  User::where('department_id', $id)
                        ->orWhere('department_id', 4)
                        ->with('role')
                        ->with('department')
                        ->get();
            return view('Users.index', ['users' => $users]);
    }

    public function getVerify(User $user)
    {
            $departments = Department::all();
            $roles = Role::all();
            $data = array();
            $id = $user->id;
            $data = ['departments' => $departments, 'roles' => $roles, 'id'=>$id];
            return view('Users.verify', ['data' => $data]);
    }

    public function verify(Request $request)
    {
        $id = $request->id;
        return User::where('id', $id)->update([
            'department_id' => $request->did,
            'role_id' => $request->rid
        ]);   
    }

    public function edit()
    {
        return view('Users.edit');
    }

    public function update(Request $request)
    {
        // if(User::where('id', $request->id)
        //         ->update([
        //             'name' => $request->name,
        //             'password' => bcrypt($request->password)
        //         ])){
        //     return redirect()->route('logout');

        // }
        return Hash::make($request->password.$request->token);
    }

    public function destroy($id)
    {
        if(User::where('id', '=', $id)->delete()){
            return redirect()->route('users');
        }
        return "Error Deleting file";
    }

    // public function login(Request $request)
    // {
    //     $email = $request->email;
    //     $pass = $request->pass;
    //     if(Auth::attempt([
    //         'email' => $email,
    //         'password' => $pass 
    //     ])) {
    //         print "ok";
    //     } else {
    //         print "NOt ok";
    //     }
    // }
}
