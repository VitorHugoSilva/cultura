<?php

Route::get('login', array('uses' => 'LoginController@login'));
Route::post('login', array('uses' => 'LoginController@attemp'));
Route::get('logout', array('uses' => 'LoginController@logout'));

Route::filter('auth', function() {
    if (Auth::guest()) return Redirect::action('LoginController@login');
});

Route::get('/', 'InicioController@index');

Route::get('menus/{id}/deletar', 'MenusController@destroy');
Route::get('menus/create/{menu_id?}', 'MenusController@create');
Route::resource('/menus', 'MenusController');

Route::get('/estados/{id}/deletar', 'EstadosController@destroy');
Route::resource('/estados', 'EstadosController');

Route::get('/cidades/{id}/deletar', 'CidadesController@destroy');
Route::resource('/cidades', 'CidadesController');

Route::get('/bairros/{id}/deletar', 'BairrosController@destroy');
Route::resource('/bairros', 'BairrosController');

Route::get('/cores/{id}/deletar', 'CoresController@destroy');
Route::resource('/cores', 'CoresController');

Route::get('/entidades/{id}/deletar', 'EntidadesController@destroy');
Route::resource('/entidades', 'EntidadesController');

Route::get('/atividades/{id}/deletar', 'AtividadesController@destroy');
Route::resource('/atividades', 'AtividadesController');

Route::get('/grupos/{id}/deletar', 'GruposController@destroy');
Route::resource('/grupos', 'GruposController');

Route::get('/permissoes/{id}/deletar', 'PermissoesController@destroy');
Route::resource('/permissoes', 'PermissoesController');

Route::get('/paises/{id}/deletar', 'PaisesController@destroy');
Route::resource('/paises', 'PaisesController');

Route::get('/atividades/{id}/deletar', 'AtividadesController@destroy');
Route::resource('/atividades', 'AtividadesController');

Route::get('/estados_civis/{id}/deletar', 'EstadosCivisController@destroy');
Route::resource('/estados_civis', 'EstadosCivisController');

Route::get('/segmentos_culturais/{id}/deletar', 'SegmentosCulturaisController@destroy');
Route::resource('/segmentos_culturais', 'SegmentosCulturaisController');

Route::get('/segmentos_culturais_tipos/{id}/deletar', 'SegmentosCulturaisTiposController@destroy');
Route::resource('/segmentos_culturais_tipos', 'SegmentosCulturaisTiposController');

Route::get('/user/{id}/deletar', 'UserController@destroy');
Route::resource('/user', 'UserController');