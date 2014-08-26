<?php

class SegmentosCulturaisController extends ResourceController
{
	protected static $model='SegmentoCultural';
        
        public function porArea($id){
            $model = new AreaRepresentacao();
            $retorno = [];
            $lista = $model::where('id', '=', $id)->first();
             return \Illuminate\Support\Facades\Response::json(json_encode($lista->segmentos()->get()));
        }
}