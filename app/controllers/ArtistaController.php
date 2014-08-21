<?php

class ArtistaController extends BaseController
{
    public function criar(){
        return View::make(Meta::getControllerSlug() . '.listar',[
            'artista' => new Artista()
        ]);
    }
    public function salvar(){
        DB::beginTransaction();
        var_dump(Input::all());
        $artista = new Artista(Input::except(
                'estado_endereco', 
                'cidade_endereco', 
                'bairro_endereco', 
                'endereco', 
                'cep', 
                'complemento', 
                'numero', 
                'contato_nome', 
                'tipo_contato'
        ));
        if ($artista->save()) {
            $endereco = new Endereco(
                        Input::only(
                                    'estado_endereco', 
                                    'cidade_endereco', 
                                    'bairro_endereco', 
                                    'endereco', 
                                    'cep', 
                                    'complemento', 
                                    'numero'
                                ));
            $endereco->pessoa_id = $artista->id;
            
            $endereco->save();

            $contato = new Contato();
            
            $contato->nome = Input::get('contato_nome');
            $contato->contato_tipo_id = Input::get('tipo_contato');
            $contato->pessoa_id = $artista->id;
            
          DB::rollback();
            /*
             * Foreach nos dados do enderço
             */
            
            /*
             * Foreach nos dados do Contato
             */
            
            /*
             * Foreach nos segmentos selecionados
             */
        }
//        Input::flash();

//        return Redirect::action('CadastroArtistaController@create')->withErrors($artista->errors());
    }
}

?>
