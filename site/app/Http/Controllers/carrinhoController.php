<?php declare(strict_types=1); 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade;

class carrinhoController extends Controller
{
   public function carrinhoLista()
   {
      //retornar o carrinho
    $itens = CartFacade::getContent();
    return view('carrinho',compact('itens'));
   } 

   public function adicionaCarrinho(Request $request) 
   {
      //adcionar item no carrinho
      CartFacade::add([$request->all()]);
      return redirect()->route('site.carrinho')->with('sucesso','Produto adicionado no carrinho com sucesso!');
   }

   public function remover(Request $request) 
   {
      CartFacade::remove($request->id);
      return redirect()->back()->with('remover','Produto removido do carrinho!');
   }
   public function atualizar(Request $request) 
   {
      CartFacade::update($request->id,[
         'quantity' => [
            'relative'=> false,
            'value' => $request->quantity
         ],
         ]);
         return redirect()->back()->with('atualizado','Carrinho atualizado com sucesso!');
   }

   public function limpar() 
   {
      CartFacade::clear();
      return redirect()->back()->with('limpar',' seu Carrinho está limpo!');
   }
   
}
