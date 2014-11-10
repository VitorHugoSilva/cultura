@extends('_layouts.principal')
@section('titulo')
    <h1>
        <i class="fa fa-pencil-square-o"></i> Cadastro de Artistas
    </h1>

@stop

@section('conteudo')
    @include('artista._form', [
        'route' => [Meta::getControllerSlug().'.criar'],
        'method' => 'POST',
        'model' => $artista
        ])
@stop