<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefasController;

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
    return view('welcome');
});

//Route:get('/exemplo', [ExemploController::class, 'index']);
Route::prefix('/tarefas')->group(function(){

    Route::get('/', [TarefasController::class, 'index'])->name('tarefas.index'); //Listagem de tarefas

    Route::get('add', [TarefasController::class, 'create'])->name('tarefas.add'); //Adição de uma nova tarefa
    Route::post('add', [TarefasController::class, 'store']); //Ação de adição de nova tarefa

    Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit'); //Tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'editAction']);//Ação edição

    Route::get('delete/{id}', [TarefasController::class, 'del'])->name('tarefas.del');//Ação deletar

    Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done'); // Marcar resolvido S/N

});
