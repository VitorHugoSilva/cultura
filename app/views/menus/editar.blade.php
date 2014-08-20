@extends('_layouts.principal')

@section('title')
Teste
@stop

@section('acoes-da-pagina')
<div class="btn-group">
    <a class="btn btn-default" href="{{ URL::previous() }}">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>
</div>
@stop

@section('conteudo')
@include('menus._form', [
    'menu' => $menu,
    'route' => ['menus.alterar', $menu->id],
    'method' => 'PUT',
    'menu_id' => null
])
@stop