<?php $model_class = get_class($models->get(0))?>

@extends('_layouts.principal')

@section('acoes-da-pagina')
    
    <div class="pull-right">
    <div class="col-lg-3 col-md-3 col-sm-3 ">
            @include('_parciais.acao-novo', ['url' => URL::action(Meta::getController() . '@criar')])
        
    </div>   

    <div class="col-lg-9 col-md-9 col-sm-9 ">
        @include('_parciais.form.pesquisa', ['model' => $model_class])
    </div>
    </div>
@stop

@section('conteudo')

@include('_parciais.modal-confirm-action')

@if($models->count())
<table class="table table-striped table-crud">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Nome Artistico</th>
            <th>            
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($models as $i => $model)
        <tr class="table-crud-item">
            <td>{{{++$i}}}</td>
            <td>{{ $model->nome }}</td>
            <td>{{ $model->nome_artistico }}</td>
            <td class="acoes">                        
                <div class="btn-group pull-right">
                    <a class="btn btn-default" title="Visualizar o registro" href="{{URL::action('CarteirinhaController@emitirCarteirinha',[$model->id])}}">
                    <i class="fa fa-credit-card"></i> Emitir Carteirinha
                    </a>
                    <a class="btn btn-default" title="Visualizar o registro" href="#">
                    <i class="fa fa-eye"></i> Detalhes
                    </a>

                    <a class="btn btn-default" title="Editaro registro" href="#">
                    <i class="fa fa-pencil-square-o"></i> Editar
                    </a>
                    <a class="btn btn-danger modal-confirm-action action-delete" title="Deletar o registro" href="#", data-mensagem="Deseja realmente deletar?">
                        <i class="fa fa-trash-o"></i> Deletar
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">{{ $models->links() }}</div>
@endif
@stop
