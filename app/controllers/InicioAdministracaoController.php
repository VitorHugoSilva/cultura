<?php

class InicioAdministracaoController extends BaseController
{
    public function listar()
    {
        return View::make('_layouts.principal');
    }
}