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
    @elseif($superior)
    <a class="btn btn-default" href="{{URL::action('MenusController@index')}}">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>  
    @endif
    <span class="btn btn-default novo">
        <i class="fa fa-plus"></i> Novo
    </span>    
</div>
@stop

@section('conteudo')

    <form class="form-novo form-inline hidden" role="form">
      <div class="form-group">
        <label class="sr-only" for="id">ID</label>
        <input type="text" class="form-control" id="id" disabled placeholder="#" size="1">
      </div>
      <div class="form-group">
        <label class="sr-only" for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" placeholder="Nome">
      </div>
      <div class="form-group">
        <label class="sr-only" for="url">Url</label>
        <input type="text" class="form-control" id="url" placeholder="Url">
      </div>
      <div class="form-group">
        <label class="sr-only" for="icone">Ícone</label>
        <input type="text" class="form-control" id="icone" placeholder="Ícone">
      </div>
      <div class="form-group">
        <label class="sr-only" for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" placeholder="Descrição">
      </div>
      <div class="form-group">
        <label class="sr-only" for="ordem">Ordem</label>
        <input type="number" class="form-control input-small" id="ordem" size="2">
      </div>
      <div class="form-group">
        <label class="sr-only" for="permissao">Permissao</label>
        <input type="number" class="form-control input-small" id="permissao" size="2">
      </div>
      <div class="form-group">
        <label class="sr-only" for="ativo">Ativo</label>
        <input type="boolean" class="form-control input-small" id="ativo" size="2">
      </div>
      <button type="submit" class="btn btn-default">Criar</button>
    </form>

    @include('_parciais.tabela-listagem', [
        'itens' => $itens,
        'campos' => ['id', 'nome', 'url', 'icone','descricao', 'ordem', 'permissao', 'ativo'],
    ])
@stop