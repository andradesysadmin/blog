@extends('layouts.master')

@section('title', 'Home')

@section('content')
<center>
@auth
<br><br>
    <a href="{{ url('/deletepost', $post->id) }}">DELETAR POST</a>
@endauth
<br><br><br><br><br>
    <!-- post.blade.php -->
<h1>{{ $post->nome_post }}</h1><br><br>
<img src="{{ asset($post->caminho_imagem) }}" alt="Imagem do post" width="400"><br><br>
<em>{{$post->created_at}}</em><br><br>
<p>{!! $post->body !!}</p>
<br><br><br><br><br>

</center>
@endsection