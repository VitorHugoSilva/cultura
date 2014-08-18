@extends('_layouts.principal')

@section('acoes-da-pagina')
    @include('_parciais.acao-voltar')
    @include('_parciais.acao-salvar')
@stop

@section('conteudo')
    @if(View::exists(Meta::getControllerSlug() . '._form'))
        @include(Meta::getControllerSlug() . '._form', [
            'model' => $model,
            'route'  => [Meta::getControllerSlug() . '.update', $model->id],
            'method' => 'PUT'
        ])
    @else
        @include('_parciais.form.form', [
            'model' => $model,
            'route'  => [Meta::getControllerSlug() . '.update', $model->id],
            'method' => 'PUT'
        ])
    @endif
@stop
