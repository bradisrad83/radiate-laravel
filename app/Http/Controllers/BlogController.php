<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\User;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //$all_blogs = Blog::all(); ------this is the command to select all data from DB and display it publically!!!!!!!
        
        return view('admin.allblogs')
            ->withBlogs(Blog::where('user_id', $request->user()->id)->get())
            ->withUser($request->user());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view("admin.addblog");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Peter must enter a title/post to store a blog
        $this->validate($request, [
            'blog_title' => 'required',
            'blog_post' => 'required'
        ]);

        $user_id = $request->user()->id;
        $blog_title =$request->get('blog_title');
        $blog_post= $request->get('blog_post');
        

        $new_blog = new Blog (['user_id'=>$user_id,'blog_title'=>$blog_title, 'blog_post'=>$blog_post]);
        $new_blog->save();
        return redirect()->action("BlogController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blog $blog)
    {
        //
        return view('admin.editblog')
                ->withBlog($blog)
                ->withUser($request->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        Blog::find($blog->id)->update($request->all());
        return redirect()->action("BlogController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        Blog::find($blog->id)->delete();
        return redirect()->action("BlogController@index");
    }
}
