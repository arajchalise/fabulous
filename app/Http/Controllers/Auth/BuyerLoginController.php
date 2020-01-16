<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class BuyerLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:buyer', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('auth.buyer_login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      
      // Attempt to log the user in
      if (Auth::guard('buyer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        if($request->session()->has('cart')){
            return redirect()->intended(route('checkout'));
        }
        return redirect()->intended(route('client.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('buyer')->logout();
        return redirect()->route('products');
    }
}
