<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ControllerFuncionario;
use App\Http\Controllers\ControllerTarefa;

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
    if(Auth::check()){
        return redirect()->route('tarefa.kanban');
        // return redirect()->route('tarefa.kanban');
    }
    return redirect()->route('viewlogin');
})->name('login1');

Route::get('login',[ControllerAdmin::class,'viewlogin'])->name('viewlogin');
Route::post('login1',[ControllerAdmin::class,'login'])->name('login2');
Route::middleware(['auth'])->group(function(){

    Route::prefix('sgtarefa')->group(function(){

        Route::prefix('funcionarios')->name('funcionarios.')->group(function(){
            Route::get('funcionarios',[ControllerFuncionario::class,'index'])->name('index');
            Route::post('store',[ControllerFuncionario::class,'store'])->name('store');
            Route::post('update/{id}',[ControllerFuncionario::class,'update'])->name('update');
        });

        Route::prefix('tarefas')->name('tarefa.')->group(function(){
            Route::get('tarefas',[ControllerTarefa::class,'index'])->name('index');
            Route::get('nova-tarefa',[ControllerTarefa::class,'create'])->name('create');
            Route::get('ver-tarefa/{id}',[ControllerTarefa::class,'show'])->name('show');
            Route::get('edit-tarefa/{id}',[ControllerTarefa::class,'edit'])->name('edit');
            Route::post('update-tarefa/{id}',[ControllerTarefa::class,'update'])->name('update');
            Route::post('store-tarefa',[ControllerTarefa::class,'store'])->name('store');
            Route::get('kanban',[ControllerTarefa::class,'kanban'])->name('kanban');
        });

        Route::prefix('utilizador')->name('utilizador.')->group(function(){
            Route::post('logout',[ControllerAdmin::class,'logout'])->name('logout');
        });


    });
});
