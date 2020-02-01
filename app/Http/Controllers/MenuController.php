<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Auth;

class MenuController extends Controller
{
    
    public function index()
    {
        if (Auth::check()) {
            $menus = Menu::all();
            return view('Menus.index', ['menus' => $menus]);
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        if (Auth::check()) {
            return view('Menus.create');
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            if( Menu::create([
            'menu_name' => $request->name,
            'url' => $request->url
            ])){
                return redirect()->route('menus');
            }
            return "Error";
        } return redirect()->route('login');
    }

    public function edit(Menu $menu)
    {
        if (Auth::check()) {
            $menu = Menu::find($menu->id);
            return view('Menus.edit', ['menu' => $menu]);
        } else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            if (Menu::where('id', $request->id)->update([
            'menu_name' => $request->name,
            'url' => $request->url
            ])) {
                return redirect()->route('menus');
            }
            return "Error";
        } return redirect()->route('login');
    }

    public function destroy($id)
    {
        

        if (Auth::check()) {
            if (Menu::where('id', $id)->delete()) {
                return redirect()->route('menus');
            }
            return "Error";
        } else {
            return redirect()->route('login');
        }
    }
}
