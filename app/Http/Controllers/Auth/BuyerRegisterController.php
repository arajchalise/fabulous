<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Buyer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;

class BuyerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/products';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

     /* Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
        'firstName' => 'required|string|max:191',
        'lastName' => 'required',
        'email'   => 'required|email',
        'password' => 'required|min:6|confirmed',
        'contactNo' => 'required|min:9',
        'address' => 'required|string|max:191',
        'officeName' => 'required|string|max:191',
        'officePan' => 'required|string|max:191',
        'office_type' => 'required',
        'contactNo_type' => 'required',
        'email_type' => 'required'
      ]);
        if( Buyer::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'contact_no' => $request->contactNo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'office_name' => $request->officeName,
            'office_pan' => $request->officePan,
            'office_type' => $request->office_type,
            'contact_type' => $request->contactNo_type,
            'email_type' => $request->email_type,

        ])){
            if (Auth::guard('buyer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
             return redirect()->intended(route('products'));
            } 
      // if unsuccessful, then redirect back to the login with the form data
            return redirect()->back()->withInput($request->only('email', 'remember'));
            }
        }
}
