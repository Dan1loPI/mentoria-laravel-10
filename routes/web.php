<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::prefix('produtos')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('produto.index');
    //Create
    Route::get('/cadastrarProduto', [ProductController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProductController::class, 'cadastrarproduto'])->name('cadastrar.produto');
    //Update
    Route::get('/atualizarProduto/{id}', [ProductController::class, 'atualizaProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProductController::class, 'atualizaProduto'])->name('atualizar.produto');
    //Remove
    Route::delete('/delete', [ProductController::class, 'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('clientes.index');
});

Route::prefix('vendas')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('vendas.index');
});

Route::prefix('relatorios')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('relatorios.index');
});