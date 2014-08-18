@extends('_layouts.blank')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3">
            <a href="#" class="thumbnail">
            {{ HTML::image('imagens/logo1.jpg', 'logo',['style'=>'height: 180px; width: 4   0%; display: block;']) }}

    </a>
            <h1 class="text-center login-title">Sistema de Cadastro do Artista</h1>
            
            @if (Session::has('erro'))
                @include('_parciais.alert', ['mensagem' => Session::pull('erro'), 'class' => 'danger'])
            @endif


            <div class="account-wall">
                
                {{ Form::model($user, [
                    'action' => 'LoginController@attemp',
                    'method' => 'POST',
                    'class' => 'form-signin' ]) }}

                    {{ Form::input('text', 'email', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Email',
                        'required' => 'required',
                        'autofocus' => 'autofocus'
                       ])
                    }}
                    <br/>

                    {{ Form::input('password', 'password', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Senha',
                        'required' => 'required'
                       ])
                    }}
                <br/>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                    <label class="checkbox pull-left">
                        {{ Form::checkbox('lembrar', Input::get('lembrar')) }}
                        Lembrar minha Senha
                    </label>
                  
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop