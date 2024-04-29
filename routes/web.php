<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\SupportController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/supports', [SupportController:: class , 'index'])->name('supports.index');
Route::get('/forum', [SupportController:: class , 'create'])->name('forum.create');
//para onde vou enviar a requisição do formulario
Route::post('/forum', [SupportController::class ,'store'])->name('forum.store');
//rota importante essa acima 
Route::get('/contato', [SiteController:: class , 'contact'] );
//rota dos detalhes
Route::get('/forum{id}', [SupportController::class , 'show'])->name('forum.show');
Route::get('/forum{id}/edit', [SupportController::class , 'edit'])->name('forum.edit');
Route::put('/forum{id}' , [SupportController::class , 'update'])->name('forum.update');
//rota deletar
Route::delete('/forum{id}', [SupportController::class, 'destroy'])->name('forum.destroy');

