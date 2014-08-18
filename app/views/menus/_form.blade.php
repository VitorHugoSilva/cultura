{{ Form::model($menu, ['route' => $route, 'method' => $method]) }}

    @if($menu_id)
        {{ Form::input('hidden', 'menu_id', $menu_id) }}
    @endif

    <div class="form-group">
        {{ Form::label('nome', 'Nome') }}
        {{ Form::text('nome',null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('url', 'Url') }}
        {{ Form::text('url',null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('icone', 'Ícone') }}
        {{ Form::text('icone',null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('descricao', 'Descricao') }}
        {{ Form::text('descricao',null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('permissao', 'Permissao') }}
        {{ Form::input('number', 'permissao',null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('ordem', 'Ordem') }}
        {{ Form::input('number', 'ordem',null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('ativo', 'Status') }}
        {{ Form::select('size', array('true' => 'ATIVADO', 'false' => 'DESATIVADO')) }}
    </div>
    
    {{Form::submit('Enviar', ['class' => 'btn btn-default'])}}

{{ Form::close() }}