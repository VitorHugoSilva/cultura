@extends('_layouts.principal')

@section('acoes-da-pagina')
    @include('_parciais.acao-voltar')
    @include('_parciais.acao-alterar', [
        'url' => URL::action(Meta::getController() .'@edit', [$model->id])
    ])
@stop

@section('conteudo')
 @include('_parciais.legenda', [
    'model' => $model,
    'name' => 'nome',
    'label' =>'Nome'
  ])
@stop