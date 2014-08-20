@extends('_layouts.principal')

@section('acoes-da-pagina')
    @include('_parciais.acao-voltar')
@stop

@section('conteudo')
    @include('menus._form', [
        'menu' => $menu,
        'route' => ['menus.salvar'],
        'method' => 'POST',
        'menu_id' => $menu_id
    ])
@stop