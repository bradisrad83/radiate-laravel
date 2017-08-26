@extends('layouts.app')

@section('content')
<div class = "container">
    <h1>Radiate Blog</h1>
    @foreach($blogs as $blog) 
            {{$blog}}
            <br>
    @endforeach
<div>
@stop