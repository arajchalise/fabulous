<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $categories = Category::all();
        return view('Categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('Categories.create');
    }

    public function store(Request $request)
    {
        if ( Category::create([
            'name' => $request->name
        ])) {
            return redirect()->route('categories');
        }
    }

    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        return view('Categories.edit', ['category' => $category]);
    }

    public function destroy($id)
    {
            if(Category::where('id', $id)->delete()){
                return redirect()->route('categories');
            }
    }
}
