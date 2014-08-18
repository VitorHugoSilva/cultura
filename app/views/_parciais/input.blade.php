{{--
    name           o name do campo
    label?         label do campo
    type?          type do input (text, number, email)
    placeholder?   o atributo placeholder do campo
--}}
<div class="form-group form-group @if( $errors->count() ) @if($errors->has($name)) has-error @else has-success @endif has-feedback @endif">
    {{ Form::label($name, isset($label) ? $label : ucfirst($name), ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        @if($type === 'select')
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
</div>