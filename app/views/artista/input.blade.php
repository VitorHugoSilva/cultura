{{--
    name           o name do campo
    label?         label do campo
    type?          type do input (text, number, email)
    placeholder?   o atributo placeholder do campo
--}}
@if($categoria == 'first' || $categoria == 'first-last')
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
<div class="form-group @if( $errors->count() ) @if($errors->has($name)) has-error @else has-success @endif has-feedback @endif">
    {{ Form::label($name, isset($label) ? $label : ucfirst($name), ['class' => 'col-sm-2 control-label']) }}
    <div class="@if($acrescentavel == 'true')col-sm-7<?php $name = $name . '[]'?>@else col-sm-10 @endif @if($acrescentavel_por_categoria == 'true')<?php $name = $name . '[]'?>@endif">
        @if($type === 'file')
            {{  Form::file(
                "file", ['class' => 'form-control'], 'multiple')
            }}
            <div class="dzpreviewcustom dropzone"></div>
            <script type="text/javascript">
              $("input[name=file]").dropzone({ 
                  maxFiles: @if($name == 'foto') {{'1'}} @else {{'5'}} @endif,
                  paramName:  "file",
                  maxFilesize: 20, //mb
//                  autoProcessQueue: false,// cancela ajax
                  addRemoveLinks: true,
                  dictMaxFilesExceeded : "Limite de Arquivos atingido!",
                  dictInvalidFileType: "Formato não aceito!",
                  autoDiscover: false,
                  clickable: true,
                  previewsContainer: ".dzpreviewcustom",
                  url: "{{ URL::action(Meta::getController() . '@' . 'postarUpload') }}"
              });
            </script>
        @elseif($type === 'radio')
        Sim
            {{
                Form::radio($name, 't', false)
            }}
        Não
            {{
                Form::radio(
                $name, 'f',  false)
            }}
        @elseif($type === 'longtext')
            {{
                Form::textarea($name)
            }}
        @elseif($type === 'select')
            <?php list($model, $data_field) = explode('.', $name);  ?>
        @if($acrescentavel == 'true' || $acrescentavel_por_categoria == 'true')
            <?php $name = strtolower($model) . '_id[]'; ?>
        @else
            <?php $name = strtolower($model) . '_id'; ?>
        @endif
            {{  Form::select(
                    $name,
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
@if($categoria == 'last' || $categoria == 'first-last')
</div>
 </div>
@endif