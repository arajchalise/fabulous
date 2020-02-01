<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
  
    public function index()
    {
        if (Auth::check()) {
             $blogs = Blog::all();
             return view('Blogs.index', ['blogs' => $blogs]);
         } 
         return redirect()->route('login');
    }

    public function getBlog()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('blog', ['blogs' => $blogs]);
    }

    public function create()
    {
        if (Auth::check()) {
            return view('Blogs.create');
        }
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $file = $request->file('photo');
            $name = str_replace(" ", "_", $request->title);
            $ext = $file->getClientOriginalExtension();
            if ($file->move("images/blogImages", $name.".".$ext)){
                if( Blog::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'photo' => $name.".".$ext
                ])){
                    return redirect()->route('blogs');
                } else {
                    unlink('images/blogImages'.$name.".".$ext);
                    return "Error Storing values";
                }
            } 
            return "Error Uploading file";
        } return redirect()->route('login');
    }

    public function show(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        return view('showBlog', ['blog' => $blog]);
    }

    public function edit(Blog $blog)
    {
        if (Auth::check()) {
            $blog = Blog::find($blog->id);
            return view('Blogs.edit', ['blog' => $blog]);
        } return redirect()->route('login');
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            if (Blog::where('id', $request->id)->update([
            'title' => $request->title,
            'description' => $request->description
            ])) {
            return redirect()->route('blogs');
            } 
            return "Error";
        } return redirect()->route('login');
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            $blog = Blog::find($id);
            if (unlink('images/blogImages/'.$blog->photo)){
                if(Blog::where('id', $id)->delete()){
                return redirect()->route('blogs');
                }
            }
            return "Error";
        } return redirect()->route('login');
    }
}
