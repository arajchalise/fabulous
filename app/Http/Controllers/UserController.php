<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;
use App\Role;
use Auth;
use Hash;

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
         User::where('id', $id)->update([
            'department_id' => $request->did,
            'role_id' => $request->rid
        ]); 
        return redirect()->route('users');  
    }

    public function edit()
    {
        return view('Users.edit');
    }

   public function changedPassword(Request $request)
    {
        if (!Hash::check($request->cpassword, Auth::user()->password)) {
            return back()->with('error', "Current password mismatch");
        }
        if (strcmp($request->cpassword, $request->password) == 0) {
            return back()->with('error', "Your Current password cant be used as a new password");
        }
        $request->validate([
            'cpassword' => 'required',
            'password' => 'required|min:6|confirmed'
      ]);
        $buyer = Auth::user();
        $buyer->password = bcrypt($request->password);
        if ($buyer->save()) {
            return redirect()->route('users');
        } return "Error Changing Password";
    }

    public function destroy($id)
    {
        if(User::where('id', '=', $id)->delete()){
            return redirect()->route('users');
        }
        return "Error Deleting file";
    }

}
