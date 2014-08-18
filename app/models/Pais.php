<?php

class Pais extends BaseModel
{

    protected $fillable = ['nome'];

    protected $table = 'paises';

    public static $rules = [
        'nome' => 'required|max:40|unique:paises'
        
    ];

    public static $meta = [
        'nome' => 'text|País|Nome do País',
       
    ];

    public static $asOption = ['nome', 'id'];

    
}