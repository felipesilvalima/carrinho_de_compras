<?php declare(strict_types=1);
use Illuminate\Support\Str;
use Darryldecode\Cart\Facades\CartFacade;
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>site</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
</head>
<body>
    <nav class="blue">
        <div class="nav-wrapper container">
          <a href="{{route('home.index')}}" class="brand-logo center">CursoLaravel</a>
          <ul id="nav-mobile" class="left">
            <li><a href="{{route('home.index')}}">Home</a></li>
            <li><a href="{{route('site.carrinho')}}">Carrinho🛒</a></li>
          </ul>
        </div>
      </nav>
  <div class="row container">
    @include('mensagem')

    @if($itens->count() == 0)

<div class="card orange">
  <div class="card-content white-text">
    <span class="card-title">Seu carrinho está vazio!</span>
    <p>Aproveite nossas promoçoes!</p>
  </div>
</div>

    @else
    <h5>Seu carrinho possui {{$itens->count()}} produtos!</h5>
    <table class="striped">
        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
          </tr>
        </thead>
        @foreach($itens as $item)
        <tbody>
          <tr>
            <td><img src="{{$item->imagem}}" alt=""></td>
            <td>{{$item->name}}</td>
            <td>R$ {{number_format($item->price,2,',','.')}}</td>
            {{--BTN ATUALIZAR--}}
            <form action="{{route('site.atualizar')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$item->id}}">
              <td><input style="width: 30px; font-weight:900;" class="withe center" type="number" name="quantity" value="{{$item->quantity}}" min="1"></td>
            <td>
             <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
            </form>
            
                 {{--BTN REMOVER--}}
                <form action="{{route('site.remover')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                </form>
               
            </td>

          </tr>
        </tbody>
        @endforeach
      </table>

      <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title">R$ {{number_format(CartFacade::getTotal(),2,',','.')}}</span>
          <p>Page em 12x sem juros!</p>
        </div>
      </div>

    


        <div class="row">
          <div class="col s12 m3">
            <form action="{{route('home.index')}}" method="get" enctype="multipart/form-data">
              @csrf
              <button class="btn waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></button>
            </form>
          </div>
        
          <div class="col s12 m2">
            <form action="{{route('site.limpar')}}" method="post" enctype="multipart/form-data">
              @csrf
              <button class="btn waves-effect waves-light red">Limpar Carrinho<i class="material-icons right">clear</i></button>
            </form>
          </div>
        
          <div class="col s12 m2">
            <form action="" method="get" enctype="multipart/form-data">
              @csrf
              <button class="btn waves-effect waves-light green">Finalizar Pedido <i class="material-icons">check</i></button>
            </form>
          </div>
        </div>     
    
</div>
     
 @endif
         
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
</body>
</html>