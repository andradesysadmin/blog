<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Post;

class MainController extends Controller
{
    public function index(){

        $posts = Post::all();

        return view('home', ['nomeposts'=>$posts]);
    }
    public function store(Request $request){

        $validated = $request->validate([
            'nome' => 'required|max:255',
            'pass' => 'required',
        ]);

        $user = User::where('name', $request->input('nome'))->first();

        // Verifica se o usuário existe e se a senha não está criptografada com Bcrypt
        if ($user && !Hash::needsRehash($user->password)) {
            // Recriptografa a senha com Bcrypt
            $user->password = Hash::make($request->input('pass'));
            $user->save();
        }

        if ($user && Hash::check($request->input('pass'), $user->password)) {
            // Autenticação bem-sucedida
            Auth::login($user);
            return redirect('/');
        } else {
            // Autenticação falhou
            return redirect()->back()->withInput()->withErrors(['auth' => 'Credenciais inválidas']);
        }
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }

    public function postando(Request $request){

        $validated = $request->validate([
            'post_nome' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->nome_post = $request->post_nome; 
        $post->body = $request->body;
        $post->save();

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminho = public_path('imagens');
            $nomeArquivo = uniqid() . '.' . $imagem->getClientOriginalExtension();
            $imagem->move($caminho, $nomeArquivo);

            $post = new Post();
            $post->nome_post = $request->post_nome;
            $post->body = $request->body;
            $post->caminho_imagem = 'imagens/' . $nomeArquivo;
            $post->save();
        }
        return redirect('/');
    }
    public function post($id){
        $post = Post::find($id);
        return view('post', ['post' => $post]);
    }
    public function deletepost($id){
        $post = Post::find($id); 

        if ($post->caminho_imagem) {
            $caminhoImagem = public_path($post->caminho_imagem);

            if (File::exists($caminhoImagem)) {
                File::delete($caminhoImagem);
            }
        }

        $post->delete();
        
        return redirect('/');
    }
}
