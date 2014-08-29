{{ Form::model($model, ['route' => $route, 'method' => $method, 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'form-principal']) }}


<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active" id="btn_pessoa_fisica">
    <input type="radio" name="tipo_pessoa" id="option1" value ="1" checked> Pessoa Física
  </label>
  <label class="btn btn-primary" id="btn_pessoa_juridica">
    <input type="radio" name="tipo_pessoa" id="option2" value ="2"> Pessoa Jurídica
  </label>
 
</div>
<br/>
<br/>
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