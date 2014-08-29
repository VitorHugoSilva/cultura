{{ Form::model('', ['route' => $route, 'method' => $method]) }}




    <div class="form-group pessoa-fisica">
        {{ Form::label('foto', 'Foto') }}
        {{ Form::file('foto',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('nome', 'Nome') }}
        {{ Form::text('nome',null, ['class' => 'form-control']) }}
    </div>
        <div class="form-group pessoa-fisica">
        {{ Form::label('nome_artistico', 'Nome Artistico') }}
        {{ Form::text('nome_artistico',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('data_nascimento', 'Data de nascimento') }}
        {{ Form::text('data_nascimento',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('cpf', 'CPF') }}
        {{ Form::text('cpf',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('rg', 'RG') }}
        {{ Form::text('rg',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('grupo', 'Banda, Grupo ou associação') }}
        {{ Form::text('grupo',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('cep', 'CEP') }}
        {{ Form::text('cep',null, ['class' => 'form-control']) }}
        <a href="http://www.buscacep.correios.com.br/" target="_new">Pesquisar CEP</a>
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('endereco', 'Endereço') }}
        {{ Form::text('endereco',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('cidade', 'Cidade') }}
        {{ Form::text('cidade',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('estado', 'Estado') }}
        {{ Form::text('estado',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('telefonte', 'Telefone') }}
        {{ Form::text('telefone',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('celular', 'Celular') }}
        {{ Form::text('celular',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('emal', 'E-mail') }}
        {{ Form::email('email',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('site', 'Site') }}
        {{ Form::text('site',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('facebook', 'Facebook') }}
        {{ Form::text('facebook',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('apresentacao', 'Breve apresentação') }}
       <textarea id="apresentacao" name="apresentacao" class="form-control"></textarea>
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('historico', 'Sua história') }}
       <textarea id="historico" name="historico" class="form-control"></textarea>
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('portifolio', 'Portfólio (insira links para divulgação de seu trabalho YouTube, Facebook, reportagens etc') }}
       <textarea id="portifolio" name="portifolio" class="form-control"></textarea>
    </div>
    <div class="form-group pessoa-fisica">
        {{ Form::label('valor_trabalho', 'Valor Base de seu trabalho') }}
        {{ Form::text('valor_trabalho',null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group pessoa-fisica">
         {{ Form::label('segmento_princial_id', 'Selecione os segmentos artísticos e culturais nos quais você atua (Marque os segmento principal no qual você tem experiência comprovada)') }}
         <select id="segmento_princial_id" name="segmento_princial_id" class="form-control">
         <option>-selecione-</option>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
         </select>
     </div>
     <div class="form-group pessoa-fisica">
         {{ Form::label('segmento_princial_id', 'Outros segmentos que você participa') }}
         <select multiple id="segmento_princial_id" name="segmento_princial_id" class="form-control">
         <option>-selecione-</option>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
            <optgroup label="artes cênicas">
                <option>circo</option>
                <option>dança</option>
                <option>mímica</option>
                <option>ópera</option>
                <option>teatro</option>
                <option>ações de capacitação e treinamento de pessoal</option>
            </optgroup>
         </select>
     </div>
     <div class="">
     <h3>Insira seus arquivos (fotos, capas, banners, Videos, documentos),
     <br/> obs.: Tamanho máximo do arquivo 50 Mb.</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">Arquivo 
            <span class="btn-group ">
                <span class="btn btn-success "> <i class="fa fa-plus"></i> Adicionar</span>
            </span>
        </div>
        <div class="panel-body">
            <div class="form-group pessoa-fisica">
                {{ Form::label('nome_arquivo[]', 'Nome do arquivo') }}
                {{ Form::text('nome_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('tipo_arquivo[]', 'Tipo do arquivo') }}
                {{ Form::text('tipo_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">    
                {{ Form::label('arquivo[]', 'arquivo') }}
                {{ Form::file('arquivo[]',null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Arquivo 
            <span class="btn-group">
                <span class="btn btn-success"> <i class="fa fa-plus"></i> Adicionar</span>
                <span class="btn btn-danger"> <i class="fa fa-minus"></i> Remover</span>
            </span>
        </div>
        <div class="panel-body">
            <div class="form-group pessoa-fisica">
                {{ Form::label('nome_arquivo[]', 'Nome do arquivo') }}
                {{ Form::text('nome_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('tipo_arquivo[]', 'Tipo do arquivo') }}
                {{ Form::text('tipo_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('arquivo[]', 'arquivo') }}
                {{ Form::file('arquivo[]',null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>  
    <div class="panel panel-default">
        <div class="panel-heading">Arquivo 
            <span class="btn-group">
                <span class="btn btn-success"> <i class="fa fa-plus"></i> Adicionar</span>
                <span class="btn btn-danger"> <i class="fa fa-minus"></i> Remover</span>
            </span>
        </div>
        <div class="panel-body">
            <div class="form-group pessoa-fisica">
                {{ Form::label('nome_arquivo[]', 'Nome do arquivo') }}
                {{ Form::text('nome_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('tipo_arquivo[]', 'Tipo do arquivo') }}
                {{ Form::text('tipo_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('arquivo[]', 'arquivo') }}
                {{ Form::file('arquivo[]',null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>  
    <div class="panel panel-default">
        <div class="panel-heading">Arquivo 
            <span class="btn-group">
                <span class="btn btn-success"> <i class="fa fa-plus"></i> Adicionar</span>
                <span class="btn btn-danger"> <i class="fa fa-minus"></i> Remover</span>
            </span>
        </div>
        <div class="panel-body">
            <div class="form-group pessoa-fisica">
                {{ Form::label('nome_arquivo[]', 'Nome do arquivo') }}
                {{ Form::text('nome_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('tipo_arquivo[]', 'Tipo do arquivo') }}
                {{ Form::text('tipo_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('arquivo[]', 'arquivo') }}
                {{ Form::file('arquivo[]',null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>  
    <div class="panel panel-default">
        <div class="panel-heading">Arquivo 
            <span class="btn-group">
                <span class="btn btn-success"> <i class="fa fa-plus"></i> Adicionar</span>
                <span class="btn btn-danger"> <i class="fa fa-minus"></i> Remover</span>
            </span>
        </div>
        <div class="panel-body">
            <div class="form-group pessoa-fisica">
                {{ Form::label('nome_arquivo[]', 'Nome do arquivo') }}
                {{ Form::text('nome_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('tipo_arquivo[]', 'Tipo do arquivo') }}
                {{ Form::text('tipo_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('arquivo[]', 'arquivo') }}
                {{ Form::file('arquivo[]',null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>  
    <div class="panel panel-default">
        <div class="panel-heading">Arquivo 
            <span class="btn-group">
                <span class="btn btn-success"> <i class="fa fa-plus"></i> Adicionar</span>
                <span class="btn btn-danger"> <i class="fa fa-minus"></i> Remover</span>
            </span>
        </div>
        <div class="panel-body">
            <div class="form-group pessoa-fisica">
                {{ Form::label('nome_arquivo[]', 'Nome do arquivo') }}
                {{ Form::text('nome_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('tipo_arquivo[]', 'Tipo do arquivo') }}
                {{ Form::text('tipo_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('arquivo[]', 'arquivo') }}
                {{ Form::file('arquivo[]',null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>  
    <div class="panel panel-default">
        <div class="panel-heading">Arquivo 
            <span class="btn-group">
                <span class="btn btn-success"> <i class="fa fa-plus"></i> Adicionar</span>
                <span class="btn btn-danger"> <i class="fa fa-minus"></i> Remover</span>
            </span>
        </div>
        <div class="panel-body">
            <div class="form-group pessoa-fisica">
                {{ Form::label('nome_arquivo[]', 'Nome do arquivo') }}
                {{ Form::text('nome_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('tipo_arquivo[]', 'Tipo do arquivo') }}
                {{ Form::text('tipo_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('arquivo[]', 'arquivo') }}
                {{ Form::file('arquivo[]',null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>  
    <div class="panel panel-default">
        <div class="panel-heading">Arquivo 
            <span class="btn-group">
                <span class="btn btn-success"> <i class="fa fa-plus"></i> Adicionar</span>
                <span class="btn btn-danger"> <i class="fa fa-minus"></i> Remover</span>
            </span>
        </div>
        <div class="panel-body">
            <div class="form-group pessoa-fisica">
                {{ Form::label('nome_arquivo[]', 'Nome do arquivo') }}
                {{ Form::text('nome_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('tipo_arquivo[]', 'Tipo do arquivo') }}
                {{ Form::text('tipo_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('arquivo[]', 'Arquivo') }}
                {{ Form::file('arquivo[]',null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>  
    <div class="panel panel-default">
        <div class="panel-heading">Arquivo 
            <span class="btn-group">
                <span class="btn btn-success"> <i class="fa fa-plus"></i> Adicionar</span>
                <span class="btn btn-danger"> <i class="fa fa-minus"></i> Remover</span>
            </span>
        </div>
        <div class="panel-body">
            <div class="form-group pessoa-fisica">
                {{ Form::label('nome_arquivo[]', 'Nome do arquivo') }}
                {{ Form::text('nome_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('tipo_arquivo[]', 'Tipo do arquivo') }}
                {{ Form::text('tipo_arquivo[]',null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group pessoa-fisica">
                {{ Form::label('arquivo[]', 'Arquivo') }}
                {{ Form::file('arquivo[]',null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>    

    {{Form::submit('Enviar', ['class' => 'btn btn-success'])}}

{{ Form::close() }}
