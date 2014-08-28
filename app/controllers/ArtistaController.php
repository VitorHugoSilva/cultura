<?php

class ArtistaController extends BaseController
{
    //2014-08-20 23:46:14.844-03
    public function criar(){
        return View::make(Meta::getControllerSlug() . '.listar',[
            'artista' => new Artista()
        ]);
    }
    public function salvar(){
        DB::beginTransaction();
        $artista = new Artista(Input::only(
                'nome', 
                'nome_artistico', 
                'inscricao_estadual', 
                'inscricao_municipal', 
                'razao_social', 
                'nome_fantasia', 
                'cpf_responsavel', 
                'rg_responsavel', 
                'arearepresentacao_id',
                'cpf',
                'identidade',
                'cnpj',
                'data_nascimento',
                'possui_cadastro_siniic',
                'apresentacao',
                'historico',
                'portfolio',
                'necessidade_tecnica',
                'valor_pretendido'
        ));
        
        $pasta = dir(public_path() . '/uploads');
        $uploads = [];
            while($arquivo = $pasta->read()){
                if(Illuminate\Support\Str::contains($arquivo, Cookie::get('laravel_session'))){
                    $upload = new \stdClass;
                    $upload->nome = $arquivo;
                    $upload->path_completo = $pasta->path . '/' . $arquivo;
                    $upload->conteudo_arquivo =  file_get_contents($upload->path_completo);
                    File::delete($upload->path_completo);
                    $uploads[] = $upload;
                }
            }
            
        if ($artista->save()) {
            foreach(Input::get('endereco') as $key => $value){
                $enderecoObject = new Endereco();
                $enderecoObject->estado_endereco    = Input::get("estado_endereco.$key");
                $enderecoObject->cidade_endereco    = Input::get("cidade_endereco.$key");
                $enderecoObject->bairro_endereco    = Input::get("bairro_endereco.$key"); 
                $enderecoObject->endereco           = Input::get("endereco.$key");
                $enderecoObject->cep                = Input::get("cep.$key");
                $enderecoObject->complemento        = Input::get("complemento.$key");
                $enderecoObject->numero             = Input::get("numero.$key");
                
                
                $enderecoObject->pessoa_id = $artista->id;
                
                $enderecoObject->save();
            }
            foreach(Input::get('contato_nome') as $key => $value){
                $contato = new Contato();
                $contato->nome = Input::get("contato_nome.$key");
                $contato->contato_tipo_id = Input::get("contatotipo_id.$key");
                $contato->pessoa_id = $artista->id;
                $contato->save();
            }
            foreach ($uploads as $upload) {
                
                if(Illuminate\Support\Str::contains($upload->nome, Cookie::get('laravel_session'))){
                    $arquivoObject = new Arquivo();
                    $arquivoObject->nome = substr($upload->nome, (strpos($upload->nome, '-')+1));
                    $arquivoObject->arquivo = utf8_encode($upload->conteudo_arquivo);
                    $arquivoObject->arquivo_tipo_id = 1; 
                    $arquivoObject->pessoa_id = $artista->id;
                    
                    $arquivoObject->save();
                }
            }
//            var_dump(Input::all());
            if(Input::has('artista.segmentos')){
                $segmentos = Input::only('artista.segmentos');
                $artista->segmentos()->sync($segmentos['artista']['segmentos']);
            }
           

          }else{
              DB::rollback();
          }
//          var_dump(Input::all());
//          DB::rollback();
          DB::commit();
        Input::flashOnly(
                'nome', 
                'nome_artistico', 
                'inscricao_estadual', 
                'inscricao_municipal', 
                'razao_social', 
                'nome_fantasia', 
                'cpf_responsavel', 
                'rg_responsavel', 
                'cpf',
                'identidade',
                'cnpj',
                'data_nascimento',
                'possui_cadastro_siniic',
                'apresentacao',
                'historico',
                'portfolio',
                'necessidade_tecnica',
                'valor_pretendido'
                );

//        return Redirect::action('ArtistaController@criar')->withErrors($artista->errors());
    }
    
    public function postarUpload(){
        $imagem = Input::file('file');
        $nome_original = Input::file('file')->getClientOriginalName();
            $rules =[
                'file' =>'image|max:10000',
            ];
//            $validacao = Validator::make($imagem, $rules);
//            
//            if($validacao->fails()){
//                return Response::make($validacao->errors->first(), 400);
//            }
            
        $destino = public_path() . '/uploads';
        $arquivo = Cookie::get('laravel_session') . time() .  '-' . $nome_original;
        $upload_success = Input::file('file')->move($destino, $arquivo);

        if( $upload_success ) {
        return Response::json('success', 200);
        } else {
        return Response::json('error', 400);
        }
    }
}

?>
