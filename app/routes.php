<?php
Route::pattern('id', '[0-9]+');

Route::get('/', 'CadastroArtistaController@criar');

Route::group(array('prefix' => 'entrada'), function()
{
    Route::get('/', array('uses' => 'LoginController@login'));   
    Route::get('login', array('uses' => 'LoginController@login'));
    Route::post('login', array('uses' => 'LoginController@attemp'));
    Route::get('logout', array('uses' => 'LoginController@logout'));
});


Route::filter('autenticacao', function() {
    if (Auth::guest()) return Redirect::action('LoginController@login');
});

Route::group(array('prefix' => 'admin', 'before' => 'autenticacao'), function()
{
    Route::get('/', 'InicioAdministracaoController@index');

    // Menus
    Route::get(
            'menus/criar/{id}',
            [
                'as'    =>  'menus.criar',
                'uses'  =>  'MenusController@criar'
            ]);

    Route::post(
            'menus/',
            [
                'as'    =>  'menus.salvar',
                'uses'  =>  'MenusController@salvar'
            ]);

    Route::get(
            'menus/',
             [
                'as'    =>  'menus.listar',
                'uses'  =>  'MenusController@listar'
            ]);

    Route::get(
            'menus/{id}',
            [
                'as'    =>  'menus.exibir',
                'uses'  =>  'MenusController@exibir'
            ]);

    Route::get(
            'menus/{id}/editar', 
            [
                'as'    =>  'menus.editar',
                'uses'  =>  'MenusController@editar'
            ]);


    Route::match(
            ['PUT'],
            'menus/{id}',
            [
                'as'    =>  'menus.alterar',
                'uses'  =>  'MenusController@alterar'
            ]);

    Route::get(
            'menus/{id}/deletar', 
            [
                'as'    =>  'menus.deletar',
                'uses'  =>  'MenusController@deletar'
            ]);

    //Tipo Pessoas
    
    Route::get(
            'integrantes/criar',
            [
                'as'    =>  'integrantes.criar',
                'uses'  =>  'IntegrantesController@criar'
            ]);

    Route::post(
            'integrantes/',
            [
                'as'    =>  'integrantes.salvar',
                'uses'  =>  'IntegrantesController@salvar'
            ]);

    Route::get(
            'integrantes/',
             [
                'as'    =>  'integrantes.listar',
                'uses'  =>  'IntegrantesController@listar'
            ]);

    Route::get(
            'integrantes/{id}',
            [
                'as'    =>  'integrantes.exibir',
                'uses'  =>  'IntegrantesController@exibir'
            ]);

    Route::get(
            'integrantes/{id}/editar', 
            [
                'as'    =>  'integrantes.editar',
                'uses'  =>  'IntegrantesController@editar'
            ]);


    Route::match(
            ['PUT'],
            'integrantes/{id}',
            [
                'as'    =>  'integrantes.alterar',
                'uses'  =>  'IntegrantesController@alterar'
            ]);

    Route::get(
            'integrantes/{id}/deletar', 
            [
                'as'    =>  'Integrantes.deletar',
                'uses'  =>  'IntegrantesController@deletar'
            ]);

     // grupos
    Route::get(
            'grupos/criar',
            [
                'as'    =>  'grupos.criar',
                'uses'  =>  'GruposController@criar'
            ]);

    Route::post(
            'grupos/',
            [
                'as'    =>  'grupos.salvar',
                'uses'  =>  'GruposController@salvar'
            ]);

    Route::get(
            'grupos/',
             [
                'as'    =>  'grupos.listar',
                'uses'  =>  'GruposController@listar'
            ]);

    Route::get(
            'grupos/{id}',
            [
                'as'    =>  'grupos.exibir',
                'uses'  =>  'GruposController@exibir'
            ]);

    Route::get(
            'grupos/{id}/editar', 
            [
                'as'    =>  'grupos.editar',
                'uses'  =>  'GruposController@editar'
            ]);


    Route::match(
            ['PUT'],
            'grupos/{id}',
            [
                'as'    =>  'grupos.alterar',
                'uses'  =>  'GruposController@alterar'
            ]);

    Route::get(
            'grupos/{id}/deletar', 
            [
                'as'    =>  'grupos.deletar',
                'uses'  =>  'GruposController@deletar'
            ]);

    // Segmentos Culturais Tipos
    Route::get(
            'segmentos_culturais_tipos/criar',
            [
                'as'    =>  'segmentos_culturais_tipos.criar',
                'uses'  =>  'SegmentosCulturaisTiposController@criar'
            ]);

    Route::post(
            'segmentos_culturais_tipos/',
            [
                'as'    =>  'segmentos_culturais_tipos.salvar',
                'uses'  =>  'SegmentosCulturaisTiposController@salvar'
            ]);

    Route::get(
            'segmentos_culturais_tipos/',
             [
                'as'    =>  'segmentos_culturais_tipos.listar',
                'uses'  =>  'SegmentosCulturaisTiposController@listar'
            ]);

    Route::get(
            'segmentos_culturais_tipos/{id}',
            [
                'as'    =>  'segmentos_culturais_tipos.exibir',
                'uses'  =>  'SegmentosCulturaisTiposController@exibir'
            ]);

    Route::get(
            'segmentos_culturais_tipos/{id}/editar', 
            [
                'as'    =>  'segmentos_culturais_tipos.editar',
                'uses'  =>  'SegmentosCulturaisTiposController@editar'
            ]);


    Route::match(
            ['PUT'],
            'segmentos_culturais_tipos/{id}',
            [
                'as'    =>  'segmentos_culturais_tipos.alterar',
                'uses'  =>  'SegmentosCulturaisTiposController@alterar'
            ]);

    Route::get(
            'segmentos_culturais_tipos/{id}/deletar', 
            [
                'as'    =>  'segmentos_culturais_tipos.deletar',
                'uses'  =>  'SegmentosCulturaisTiposController@deletar'
            ]);

    // Segmentos Culturais
    Route::get(
            'segmentos_culturais/criar',
            [
                'as'    =>  'segmentos_culturais.criar',
                'uses'  =>  'SegmentosCulturaisController@criar'
            ]);

    Route::post(
            'segmentos_culturais/',
            [
                'as'    =>  'segmentos_culturais.salvar',
                'uses'  =>  'SegmentosCulturaisController@salvar'
            ]);

    Route::get(
            'segmentos_culturais/',
             [
                'as'    =>  'segmentos_culturais.listar',
                'uses'  =>  'SegmentosCulturaisController@listar'
            ]);

    Route::get(
            'segmentos_culturais/{id}',
            [
                'as'    =>  'segmentos_culturais.exibir',
                'uses'  =>  'SegmentosCulturaisController@exibir'
            ]);

    Route::get(
            'segmentos_culturais/{id}/editar', 
            [
                'as'    =>  'segmentos_culturais.editar',
                'uses'  =>  'SegmentosCulturaisController@editar'
            ]);


    Route::match(
            ['PUT'],
            'segmentos_culturais/{id}',
            [
                'as'    =>  'segmentos_culturais.alterar',
                'uses'  =>  'SegmentosCulturaisController@alterar'
            ]);

    Route::get(
            'segmentos_culturais/{id}/deletar', 
            [
                'as'    =>  'segmentos_culturais.deletar',
                'uses'  =>  'SegmentosCulturaisController@deletar'
            ]);

    // User
    Route::get(
            'usuarios/criar',
            [
                'as'    =>  'user.criar',
                'uses'  =>  'UserController@criar'
            ]);

    Route::post(
            'usuarios/',
            [
                'as'    =>  'user.salvar',
                'uses'  =>  'UserController@salvar'
            ]);

    Route::get(
            'usuarios/',
             [
                'as'    =>  'user.listar',
                'uses'  =>  'UserController@listar'
            ]);

    Route::get(
            'usuarios/{user}',
            [
                'as'    =>  'user.exibir',
                'uses'  =>  'UserController@exibir'
            ]);

    Route::get(
            'usuarios/{id}/editar', 
            [
                'as'    =>  'user.editar',
                'uses'  =>  'UserController@editar'
            ]);


    Route::match(
            ['PUT'],
            'usuarios/{id}',
            [
                'as'    =>  'user.alterar',
                'uses'  =>  'UserController@alterar'
            ]);

    Route::get(
            'usuarios/{id}/deletar', 
            [
                'as'    =>  'user.deletar',
                'uses'  =>  'UserController@deletar'
            ]);

    //Tipo Pessoas
    
    Route::get(
            'tipos_pessoas/criar',
            [
                'as'    =>  'tipos_pessoas.criar',
                'uses'  =>  'TiposPessoasController@criar'
            ]);

    Route::post(
            'tipos_pessoas/',
            [
                'as'    =>  'tipos_pessoas.salvar',
                'uses'  =>  'TiposPessoasController@salvar'
            ]);

    Route::get(
            'tipos_pessoas/',
             [
                'as'    =>  'tipos_pessoas.listar',
                'uses'  =>  'TiposPessoasController@listar'
            ]);

    Route::get(
            'tipos_pessoas/{id}',
            [
                'as'    =>  'tipos_pessoas.exibir',
                'uses'  =>  'TiposPessoasController@exibir'
            ]);

    Route::get(
            'tipos_pessoas/{id}/editar', 
            [
                'as'    =>  'tipos_pessoas.editar',
                'uses'  =>  'TiposPessoasController@editar'
            ]);


    Route::match(
            ['PUT'],
            'tipos_pessoas/{id}',
            [
                'as'    =>  'tipos_pessoas.alterar',
                'uses'  =>  'TiposPessoasController@alterar'
            ]);

    Route::get(
            'tipos_pessoas/{id}/deletar', 
            [
                'as'    =>  'tipos_pessoas.deletar',
                'uses'  =>  'TiposPessoasController@deletar'
            ]);


});