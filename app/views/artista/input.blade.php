{{--
    name           o name do campo
    label?         label do campo
    type?          type do input (text, number, email)
    placeholder?   o atributo placeholder do campo
--}}
@if($categoria == 'first')
 <div class="panel panel-default">
     <div class="panel-heading"> 
            @if($acrescentavel_por_categoria == 'true')
                <span class="btn-group">
                    <span class="btn btn-success addGroup"> <i class="fa fa-plus"></i> Adicionar</span>
                </span>
            @endif
         <b>{{ $rotulo_grupo}}</b>
        </div>
        <div class="panel-body">
@endif
<div class="form-group form-group @if( $errors->count() ) @if($errors->has($name)) has-error @else has-success @endif has-feedback @endif">
    {{ Form::label($name, isset($label) ? $label : ucfirst($name), ['class' => 'col-sm-2 control-label']) }}
    <div class="@if($acrescentavel == 'true' || $acrescentavel_por_categoria == 'true')col-sm-7<?php $name = $name . '[]'?>@else col-sm-10 @endif">
        @if($type === 'file')
            {{  Form::file(
                $name, ['class' => 'form-control'])
            }}
        @elseif($type === 'longtext')
            {{
                Form::textarea($name)
            }}
        @elseif($type === 'select')
            <?php list($model, $data_field) = explode('.', $name);  ?>
            {{  Form::select(
                    strtolower($model) . '_id',
                    $model::options(),
                    null,
                    [
                        'class' => 'form-control',
                        'id' => strtolower($model) . '_id'
                    ]
                )
            }}
        @else
            {{ Form::input(
                    isset($type) ? $type : 'text',
                    $name,
                    null,
                    [
                        'class' => 'form-control',
                        'placeholder' => isset($placeholder) ? $placeholder : $name,
                    ]
                )
            }}
        @endif
        @if($errors->count())
            @if($errors->has($name))
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                @foreach($errors->get($name) as $erro)
                    <span class="help-block">{{ $erro }}</span>
                @endforeach
            @else
                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
            @endif
        @endif
    </div>
    @if($acrescentavel == 'true' && $acrescentavel_por_categoria == 'false')
        <div class="col-sm-3">
            <span class="btn btn-success addElement"> <i class="fa fa-plus"></i> Adicionar</span>
        </div>
        @endif
</div>
@if($categoria == 'last')
</div>
 </div>
@endif