@extends('_layouts.principal')
@section('titulo')
    <h1>
        <i class="fa fa-pencil-square-o"></i> Cadastro do Artista 
    </h1>
@stop

@section('conteudo')
    @include('cadastro_artista._form', [
        'route' => [Meta::getControllerSlug().'.store'],
        'method' => 'POST',
        ])
@stop