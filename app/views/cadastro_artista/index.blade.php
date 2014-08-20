@extends('_layouts.principal')
@section('titulo')
    <h1>
        <i class="fa fa-pencil-square-o"></i> Cadastro do Artista 
    </h1>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="options" id="option1" checked> Pessoa Física
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option2"> Pessoa Jurídica
  </label>
 
</div>
@stop

@section('conteudo')
    @include('cadastro_artista._form', [
        'route' => [Meta::getControllerSlug().'.store'],
        'method' => 'POST',
        ])
@stop