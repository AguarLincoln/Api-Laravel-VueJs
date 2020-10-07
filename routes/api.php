<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/cadastro', 'UserController@store');

Route::post('/login', 'AuthController@login');

Route::middleware('auth:api')->put('/conta', 'UserController@update');
Route::middleware('auth:api')->post('/conteudo', 'ConteudoController@store');
Route::middleware('auth:api')->get('/conteudo', 'ConteudoController@index');
Route::middleware('auth:api')->put('/conteudo/curtir/{id}', 'ConteudoController@curtir');
Route::middleware('auth:api')->put('/conteudo/comentar/{id}', 'ConteudoController@comentar');
Route::middleware('auth:api')->get('/conteudo/pagina/{id}', 'ConteudoController@pagina');
Route::middleware('auth:api')->post('/usuario/amigo', 'UserController@amigo');
Route::middleware('auth:api')->get('/usuario/amigo', 'UserController@listaAmigos');
Route::middleware('auth:api')->get('/usuario/amigo/{id}', 'UserController@listaAmigosPagina');

Route::get('/teste', function(){
    // $user = User::find(1);
    // $user2 = User::find(2);
    // $user->conteudos()->create([
    //     'titulo' => 'Titulo de teste',
    //     'texto' => 'Vai aki um texto',
    //     'image' => '01010',
    //     'link' => 'gtyyg/fewef/wq',
    //     'data_link' => now(),
    //     'data' => now()
    // ]);
    //return ($user->conteudos);

    // add Amigos
    
    //  $user->amigos()->toggle($user2->id);
    //$user->amigos()->detach($user2->id);
    // return $user->with('amigos')->get();
    // add curtidas

    // $conteudo = Conteudo::find(1);
    // $user->amigos()->detach($conteudo);

    // add comentario
    // $conteudo = Conteudo::fin(1);
    // $user->comentarios()->create([
    //     'conteudo_id' => $conteudo,
    //     'texto' => 'Vai aki um texto',
    //     'data' => now()
    // ]);

    // return $user->amigos()->get();
});