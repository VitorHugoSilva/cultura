{{--
    Arquivo para exibir o campo na função show
    name           o name do campo
    label?         label do campo
--}}

<div class="form-group form-group @if( $errors->count() ) @if($errors->has($name)) has-error @else has-success @endif has-feedback @endif">
    {{ Form::label($name, isset($label) ? $label : ucfirst($name), ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        <p class="form-control-label">{{{ $model->$name }}}</p>        
    </div>
</div>