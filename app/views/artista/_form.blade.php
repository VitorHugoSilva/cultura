{{ Form::model($model, ['route' => $route, 'method' => $method, 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'form-principal']) }}


  @foreach($model::meta() as $campo)
    @include('artista.input', [
      'model'           => $model,
      'type'            => $campo->type,
      'name'            => $campo->name,
      'label'           => $campo->label,
      'acrescentavel'   => $campo->acrescentavel,
      'categoria'       => $campo->categoria,
      'placeholder'     => $campo->placeholder,
      'acrescentavel_por_categoria' => $campo->acrescentavel_por_categoria,
      'rotulo_grupo' => $campo->rotulo_grupo
    ])
  @endforeach

  @include('_parciais.form-salvar')

{{ Form::close() }}