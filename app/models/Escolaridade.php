<?php


class Escolaridade extends BaseModel
{
	protected $fillable = ['nome'];

    protected $table = 'escolaridades';

    public static $rules = [
        'nome' => 'required|max:40|unique:escolaridades'
        
    ];

    public static $meta = [
        'nome' => 'text|Escolaridade|Informe a escolaridade',
       
    ];
}