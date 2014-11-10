<?php

class IntegrantesController extends ResourceController
{
    protected static $model = 'Integrante';

    public function listar()
    {
        return Redirect::action('ArtistaController@listar');
    }
}
