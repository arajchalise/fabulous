<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Auth;

class MenuController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $menus = Menu::all();
            return view('Menus.index', ['menus' => $menus]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('Menus.create');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Menu::create([
            'menu_name' => $request->name,
            'url' => $request->url
        ])){
            return redirect()->route('menus');
        }
        return "Error";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        if (Auth::check()) {
            $menu = Menu::find($menu->id);
            return view('Menus.edit', ['menu' => $menu]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Menu::where('id', $request->id)->update([
            'menu_name' => $request->name,
            'url' => $request->url
        ])) {
            return redirect()->route('menus');
        }
        return "Error";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
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
