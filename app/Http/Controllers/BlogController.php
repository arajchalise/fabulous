<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        return $blog;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        return view('Blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Blog::where('id', $request->id)->update([
            'title' => $request->title,
            'description' => $request->description
        ])) {
            return redirect()->route('blogs');
        } 
        return "Error";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if (unlink('images/blogImages/'.$blog->photo)){
            if(Blog::where('id', $id)->delete()){
                return redirect()->route('blogs');
            }
        }
        return "Error";
    }
}
