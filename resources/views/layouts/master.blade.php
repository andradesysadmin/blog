<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body{
                background-color: black;
                color: white;
            }
            header{
                background-color: black;
                padding: 2%;
            }
            a{
                text-decoration: none;
                color: white;
                margin-right: 2%;
                margin-left: 2%;
            }
            a:hover{
                border-bottom: 2px solid white;
                padding-bottom: 1%;
                transition: 0.2s;
            }
            h1{
                font-size: 400%;
            }
            input{
                padding: 0.2%;
                outline: none;
                border-radius: 0;
                border: none;
            }
            .postnome{
                width: 40%;
                padding: 0.5%;
                outline: none;
            }
            textarea{
                width: 40%;
                padding: 0.5%;
                max-width: 40%;
                min-width: 40%;
                outline: none;
            }
            .box{
                margin-top: 5%;
                border: 1px solid white;
                width: 20%;
                padding: 2%;
                margin-bottom: 5%;
            }
            .botao{
                background-color: black;
                color: white;
                border: 1px solid white;
                padding: 1px;
            }
            .botao:hover{
                transform: scale(1.2);
                transition: 0.5s;
            }
            p{
                width: 60%;
            }
        </style>
    </head>
    <body>
    <header>
        <center>
            <a href="/">Home</a>
            <a href="/login">Login</a>
            @auth
                <a href="/postar">Postar</a>
                <a href="/logout">Sair</a>
            @endauth
        </center> 
    </header>
    @yield('content')
    </body>
</html>
