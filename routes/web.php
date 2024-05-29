<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){return view('home');});

// Route::controller(MainController::class)->group(function(){

//     Route::get('/login', 'index')->name('login.index');
//     Route::post('/login', 'store')->name('login.store');
//     Route::get('/logout', 'destroy')->name('login.destroy');

// });
//Rotas views
Route::get('/', [MainController::class, 'index']);
Route::get('/login', function(){
    return view('login');
});
Route::get('/postar', function(){
    return view('postar');
});
Route::get('/post/{id}', [MainController::class, 'post']);
Route::get('/deletepost/{id}', [MainController::class, 'deletepost']);

//Rotas q efetuam ações
Route::post('/store', [MainController::class, 'store']);
Route::get('/logout', [MainController::class, 'destroy']);
Route::post('/postando', [MainController::class, 'postando']);
