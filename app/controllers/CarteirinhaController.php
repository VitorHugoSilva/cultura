<?php

class CarteirinhaController extends ResourceController
{
    public function emitirCarteirinha($id){

        $artista = Artista::find($id);
        
        $foto = $artista->arquivos->first()->arquivo;
        $nome = $artista->nome;
        $nome_artistico = $artista->nome_artistico;
        $cod_identificacao = str_pad($artista->arearepresentacao->id, 2, '0', STR_PAD_LEFT) . str_pad($artista->id, 6, '0', STR_PAD_LEFT) . '/' . (new DateTime())->format('Y');
        $cpf = $artista->cpf;
        $data_nascimento = (new DateTime($artista->data_nascimento))->format('d/m/Y');
        #Atrás
        $artista = Artista::find($id);

        return View::make('carteirinha.emitir')->with([
            'foto' =>  $foto,
            'nome' => $nome,
            'nome_artistico' => $nome_artistico,
            'cod_identificacao' => $cod_identificacao,
            'cpf' => $cpf,
            'data_nascimento' => $data_nascimento
            ]);
    }
}
