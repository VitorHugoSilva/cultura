<?php

class InicioAdministracaoController extends BaseController
{
    public function index()
    {
        return View::make('_layouts.principal');
    }
}