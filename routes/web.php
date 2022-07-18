<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\{Tarefa,Funcionario};

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
        return redirect()->route('sgtarefa_kanban');
    }
    return redirect()->route('viewlogin');
})->name('login1');

Route::get('login',[ControllerAdmin::class,'viewlogin'])->name('viewlogin');
Route::post('login1',[ControllerAdmin::class,'login'])->name('login2');
Route::middleware(['auth'])->group(function(){
    
    Route::prefix('sgtarefa')->name('sgtarefa_')->group(function(){

        Route::prefix('funcionarios')->group(function(){
            Route::get('funcionarios',Funcionario::class)->name('funcionarios');
        });

        Route::get('kanban',function(){
            return view('layout.index');
        })->name('kanban');
    });
});
