<?php

class Arquivo extends BaseModel
{
    protected $fillable = ['nome', 'arquivo', 'arquivo_tipo_id'];

    public static $rules = [
        'nome' => 'required|unique:arquivos',
    ];


   

    public static function search($termo)
    {
        return parent::search($termo)->orderBy('nome')->with('cidade');
    }
}
