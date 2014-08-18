<?php $model_class = get_class($models->get(0))?>
@extends('_layouts.principal')

@section('acoes-da-pagina')
    
    <div class="pull-right">
    <div class="col-lg-3 col-md-3 col-sm-3 ">
            @include('_parciais.acao-novo', ['url' => URL::action(Meta::getController() . '@create')])
        
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
            @foreach($model_class::meta() as $meta)
            <th>{{{ $meta->label }}}</th>
            @endforeach
            <th>            
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($models as $i => $model)
        <tr class="table-crud-item">
            <td>{{{++$i}}}</td>
            @foreach($model->meta() as $meta)
                @if(Str::contains($meta->name, '.'))
                    <?php list($related, $data_field) = explode('.', $meta->name);  ?>
                    <td>{{{ $model->{strtolower($related)}->$data_field }}}</td>
                @else
                    <td>{{{ $model->{$meta->name} }}}</td>
                @endif
            @endforeach
            <td class="acoes">                        
                <div class="btn-group pull-right">
                    <a class="btn btn-default" title="Visualizar o registro" href="{{URL::action(Meta::getController() . '@' . 'show', [$model->id])}}">
                    <i class="fa fa-eye"></i> Detalhes
                    </a>

                    <a class="btn btn-default" title="Editaro registro" href="{{URL::action(Meta::getController() . '@edit', [$model->id])}}">
                    <i class="fa fa-pencil-square-o"></i> Editar
                    </a>
                    <a class="btn btn-danger modal-confirm-action action-delete" title="Deletar o registro" href="{{URL::action(Meta::getController() . '@destroy', [$model->id])}}", data-mensagem="Deseja realmente deletar?">
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
