<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
    public function all()
    {
        $buyers =  Buyer::paginate(50);
        return view('Buyers.all', ['buyers' => $buyers]);
    }
}
