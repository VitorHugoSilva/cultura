{{ Form::model($model, ['route' => $route, 'method' => $method, 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'form-principal']) }}


  @foreach($model::meta() as $campo)
    @include('_parciais.input', [
      'model' => $model,
      'type' => $campo->type,
      'name' => $campo->name,
      'label' => $campo->label,
      'placeholder' => $campo->placeholder
    ])
  @endforeach

  @include('_parciais.form-salvar')

{{ Form::close() }}