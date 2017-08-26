@extends('layouts.app')

@section('content')
<div class = "container">
    <h1>Radiate Blog</h1>
    @foreach($blogs as $blog) 
          <div class="col-sm-2">
            <button type="button" class="btn btn-primary navbar-inverse btn-sm btn-block" data-toggle="modal" data-target="#myModal{{$blog->id}}">
                {{$blog->created_at->format('M d Y')}}
            </button>
          </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{$blog->created_at->format('M d Y')}}</h4>
                  </div>
                  <div class="modal-body">
                    <h4>{{$blog->blog_title}}<h4> 
                    <p>{{$blog->blog_post}}</p> 
                  </div>
                  <div class="modal-footer">
                    <form action="/blog/{{$blog->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-default navbar-inverse" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-default navbar-inverse"><a class="bottom" href="/blog/{{$blog->id}}/edit">Edit</a></button>
                        <button class="btn btn-primary navbar-inverse" value="submit" type="submit">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
    @endforeach
<div>
@stop