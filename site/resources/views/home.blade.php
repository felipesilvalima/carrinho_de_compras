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
        <li><a href="{{route('site.carrinho')}}">Carrinho🛒<span class="new badge blue" data-badge-caption="">{{CartFacade::getContent()->count()}}</span></a></li>
      </ul>
    </div>
  </nav>
  
  <div class="row container">
    @foreach($produtos as $produto)
    <div class="col s12 m4">
       <div class="card">
          <div class="card-image">
            <img src="{{$produto->imagem}}">
          <a href="{{route('home.details',$produto->id)}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
             </div>
            <div class="card-content">
            <span class="card-title">{{$produto->name}}</span>
           <p>{{ str::limit($produto->descricao, 20) }}</p>
         </div>
        </div>
       </div>
@endforeach
</div>
     
<div class="row center">
    {{$produtos->links('custom.pagination')}}
 </div>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
</body>
</html>