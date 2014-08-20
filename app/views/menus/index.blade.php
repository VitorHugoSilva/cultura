@extends('_layouts.principal')

@section('titulo')
    <h1>
        <i class="fa fa-tasks"></i> 
        <a href="{{URL::action('MenusController@index')}}">Menus</a>
        @include('menus._trilha', ['trilha' => $trilha])
    </h1>
@stop

@section('acoes-da-pagina')
<div class="btn-group">
       

    @if(count($trilha) > 1)
    <a class="btn btn-default" href="{{URL::action('MenusController@index')}}?menu={{$trilha[count($trilha)-2]->id}}">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>
    <a class="btn btn-success" href="{{URL::action('MenusController@create')}}/{{$trilha[count($trilha)-1]->id}}">
        <i class="fa fa-plus"></i> Novo
    </a> 
    @elseif($superior)
    <a class="btn btn-default" href="{{URL::action('MenusController@index')}}">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>  
    <a class="btn btn-success" href="{{URL::action('MenusController@create')}}/{{$superior->id  }}">
        <i class="fa fa-plus"></i> Novo
    </a> 
    @else
     <a class="btn btn-success" href="{{URL::action('MenusController@create')}}">
        <i class="fa fa-plus"></i> Novo
    </a> 
    @endif

    

   
</div>
@stop

@section('conteudo')

    @include('_parciais.tabela-listagem', [
        'itens' => $itens,
        'campos' => ['id', 'nome', 'url', 'icone','descricao', 'ordem', 'permissao', 'ativo'],
    ])
@stop