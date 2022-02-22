<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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

Route::get('/', function () {
    return view('bem-vindo');
});

Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('tarefas/exportacao/{extensao}',[App\Http\Controllers\TarefaController::class, 'exportacao'])->name('tarefa.exportacao');
Route::resource('tarefa','App\Http\Controllers\TarefaController')->middleware('verified');
//Route::resource('tarefa','App\Http\Controllers\TarefaController')->middleware('auth');   Podemos usar o middleware direto na rota


Route::get('mensagem-teste',function(){
    return new MensagemTesteMail();
    //Mail::to('lucasmartinsde@gmail.com')->send(new MensagemTesteMail());
    //return 'E-mail enviado com sucesso';
    
});