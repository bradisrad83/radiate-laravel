<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;

class PublicController extends Controller
{
    //
    public function main(Blog $blog)
    {
        //sorting the blog entries by date so newest comes up first
        return view('welcome')->withBlogs(Blog::all()->sortByDesc('created_at'));
    }
}
