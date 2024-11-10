
@if(session('sucesso'))
<div class="card green">
  <div class="card-content white-text">
    <span class="card-title">Párabens!</span>
    <p>{{session('sucesso')}}</p>
  </div>
</div>
@endif

@if(session('remover'))
<div class="card red">
  <div class="card-content white-text">
    <span class="card-title">Removido!</span>
    <p>{{session('remover')}}</p>
  </div>
</div>
@endif


@if(session('atualizado'))
<div class="card green">
  <div class="card-content white-text">
    <span class="card-title">Atualizado!</span>
    <p>{{session('atualizado')}}</p>
  </div>
</div>
@endif

@if(session('limpar'))
<div class="card red">
  <div class="card-content white-text">
    <span class="card-title">Atençao!</span>
    <p>{{session('limpar')}}</p>
  </div>
</div>
@endif