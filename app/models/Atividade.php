<?php

class Atividade extends BaseModel
{

    protected $fillable = ['nome'];

    protected $table = 'atividades';

    public static $rules = [
        'nome' => 'required|max:40|unique:atividades'
    ];

    public static $meta = [
        'nome' => 'text|Atividades|Informe as Atividades'
    ];
}