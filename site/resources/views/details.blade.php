
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<nav class="blue">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo center">CursoLaravel</a>
      <ul id="nav-mobile" class="left">
        <li><a href="{{route('home.index')}}">Home</a></li>
        <li><a href="{{route('site.carrinho')}}">Carrinho🛒</a></li>
      </ul>
    </div>
  </nav>
<div class="row container">
    <div class="col s12 m6">
     <img src=" {{$produto->imagem}}" class="responsive-img">
    </div>
    <div class="col s12 m6">
        <h1>{{$produto->name}}</h1>
          <h3>R$ {{number_format($produto->preco,2,',','.')}}</h3>
        <p>{{$produto->descricao}}</p>
        <form action="{{route('site.addcarrinho')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$produto->id}}">
          <input type="hidden" name="name" value="{{$produto->name}}">
          <input type="hidden" name="price" value="{{$produto->preco}}">
          <input type="number" name="quantity" value="1" min="1">
          <input type="hidden" name="imagem" value="{{$produto->imagem}}">
          <button class="btn orange btn-large">Comprar</button>
        </form>
        
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  