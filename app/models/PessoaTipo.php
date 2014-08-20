<?php

class PessoaTipo extends BaseModel
{

    protected $fillable = ['nome'];

    protected $table = 'pessoas_tipos';

    public static $rules = [
        'nome' => 'required|max:40|unique:pessoas_tipos'
    ];

    public static $meta = [
        'nome' => 'text|Tipo de Pessoa|Informe as Atividades'
    ];
}