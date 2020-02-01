<?php

namespace App\Http\Controllers;

use App\Submenu;
use Illuminate\Http\Request;
use App\Menu;
use Auth;

class SubmenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::check()) {
            $submenus = Submenu::with('menu')->get();
            return view('Submenus.index', ['menus' => $submenus]);
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        if (Auth::check()) {
            $menus = Menu::all();
            return view('Submenus.create', ['menus' => $menus]);
        }
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        if( Submenu::create([
            'submenu_name' => $request->name,
            'url' => $request->url,
            'menu_id' => $request->mid
        ])){
            return redirect()->route('submenus');
        }
        return "Error";
    }


    public function edit(Submenu $submenu)
    {
        if (Auth::check()) {
            $submenu = Submenu::find($submenu->id);
            return view('Submenus.edit', ['submenu' => $submenu]);
        }
        return redirect()->route('login');
    }

    public function update(Request $request)
    {
        if (Submenu::where('id', $request->id)->update([
            'submenu_name' => $request->name,
            'url' => $request->url
        ])) {
            return redirect()->route('submenus');
        }
        return "Error";
    }

    public function destroy($id)
    {
       if (Auth::check()) {
             if(Submenu::where('id', $id)->delete()){
            return redirect()->route('submenus');
            }
            return "Error";
        }
        return redirect()->route('login'); 
    }
}
