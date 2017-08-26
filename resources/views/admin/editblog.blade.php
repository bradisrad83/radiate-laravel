@extends('layouts.app')

@section('content')
<div class = "container">
<h1>Edit Blog from {{$blog->created_at->format('M d Y')}}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="/blog/{{$blog->id}}" method="POST">

    {{ csrf_field() }}
    {{ method_field('PUT') }}

        <div class="form-group row">
            <label for="blog_title" class="col-sm-2 form-control-label">Title of Blog (Headline)</label>
                <div class="col-sm-6">
                    <input class="form-control"
                            type="text"
                            name="blog_title"
                            placeholder="Title or Headline for Todays Blog"
                            value="{{$blog->blog_title}}">
                </div>  
        </div>

        <div class="form-group row">
            <label for="blog_post" class="col-sm-2 form-control-label">Blog Entry</label>
                <div class="col-sm-6">
                    <textarea class="form-control"
                            rows="5"
                            type="text"
                            name="blog_post"
                            placeholder="Enter your Blog Peter">{{$blog->blog_post}}
                    </textarea>
                </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-6">
            <button class="btn btn-primary navbar-inverse" value="submit" type="submit">Save Changes</button>
            </div>
        </div>

    </form>
</div> 
@stop