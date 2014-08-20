@extends('_layouts.principal')
@section('acoes-da-pagina')
    @include('_parciais.acao-voltar')
    @include('_parciais.acao-alterar', [
        'url' => URL::action(Meta::getController() .'@editar', [$model->id])
    ])
@stop

@section('conteudo')
 @include('_parciais.legenda', [
    'model' => $model,
    'name' => 'email',
    'label' =>'Email'
  ])
@stop