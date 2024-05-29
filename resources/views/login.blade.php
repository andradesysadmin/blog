@extends('layouts.master')

@section('title', 'Login')

@section('content')
<center>
    <br><br><br><br><br>
    <h2>Login</h2><br>
    <form action="/store" method="post">
        @csrf
        <input type="text" name="nome" placeholder="Usuario..."><br><br>
        @error('nome')
            <span>{{$message}}</span>
        @enderror
        <input type="password" name="pass" placeholder="Senha..."><br><br>
        <input type="submit" class="botao" value="ENVIAR">
    </form>
</center>
@endsection