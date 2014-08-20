<?php

class CadastroArtistaController extends Controller
{
    public function create(){
        return View::make(Meta::getControllerSlug() . '.index');
    }
    public function store(){
        $artista = new Pessoa(Input::all());
        $contato = new Contato(Input::all());
        $bairro = new Bairro(Input::all());
        
        if ($artista->save()) {
        }

        Input::flash();

        return Redirect::action('CadastroArtistaController@create')->withErrors($artista->errors());
    }
}

?>
