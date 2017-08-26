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
        return view('welcome')->withBlogs(Blog::all());
    }
}
