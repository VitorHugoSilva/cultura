<?php

class ArquivoTipo extends BaseModel
{
    protected $fillable = ['nome'];
    protected $table = 'arquivos_tipos';
    public static $rules = [
        'nome' => 'required|unique:arquivos_tipos',
    ];


   

    public static function search($termo)
    {
        return parent::search($termo)->orderBy('nome')->with('cidade');
    }
}
