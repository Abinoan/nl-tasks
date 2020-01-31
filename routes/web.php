<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use PhpParser\Node\Expr\FuncCall;

# Rotas de situações das atividades
Route::resource('situacoes', 'ControllerSituacao'); 
Route::post('/situacoes/create', 'ControllerSituacao@save_new');

# rotas de clientes
Route::resource('clientes', 'ControllerCliente'); 
Route::post('/clientes/create', 'ControllerCliente@save_new');

# rotas de grupos de atividades
Route::resource('grupos', 'ControllerGrupo'); 
Route::post('/grupos/create', 'ControllerGrupo@save_new');

# rotas de cadastro de projetos
Route::resource('projetos', 'ControllerProjeto'); 
Route::post('/projetos/create', 'ControllerProjeto@save_new');

# Outras Rotas Redefinidas
Auth::routes();

Route::get('/', function() {
    return view('home');
})->middleware('auth');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
