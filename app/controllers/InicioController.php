<?php

class InicioController extends BaseController
{
    public function index()
    {
        return View::make('_layouts.principal');
    }
}