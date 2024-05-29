@extends('layouts.master')

@section('title', 'Home')

@section('content')
<center>
<br><br><br><br><br>
    <h1>Gabriel Andrade</h1>
    <em>Blog de técnologia e computação</em>
    <br><br>
    @foreach ($nomeposts as $post)
        <div class="box"><h2><a href="{{ url('/post', $post->id) }}">{{$post->nome_post}}</a></h2></div>
    @endforeach
</center>
@endsection