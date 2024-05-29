@extends('layouts.master')

@section('title', 'Home')

@section('content')
@auth
<center>

<br><br><br><br><br>
    <h2>Novo post</h2><br>
    <form action="/postando" method="post" enctype="multipart/form-data">
        @csrf
        Imagem: <input type="file" name="imagem" class="inputimg"><br><br>
        <input type="text" class="postnome" name="post_nome" placeholder="Nome do post..."><br><br>
        <textarea name="body" placeholder="Conteudo do post..."></textarea><br><br>
        <input type="submit" class="botao" value="POSTAR"><br><br>
    </form>
</center>
@endauth
@endsection