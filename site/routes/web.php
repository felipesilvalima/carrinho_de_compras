<?php declare(strict_types=1);

use App\Http\Controllers\carrinhoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//home
Route::get('home',[SiteController::class,'index'])->name('home.index');
//details
Route::get('details{id}',[SiteController::class,'details'])->name('home.details');
//carrinho
Route::get('carrinho',[carrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
//adicionarCarrinho
Route::post('carrinho',[carrinhoController::class, 'adicionaCarrinho'])->name('site.addcarrinho');
//remover
Route::post('remover',[carrinhoController::class, 'remover'])->name('site.remover');
//atualizar
Route::post('atualizar',[carrinhoController::class, 'atualizar'])->name('site.atualizar');
//limpar carrinho
Route::post('limpar',[carrinhoController::class, 'limpar'])->name('site.limpar');


