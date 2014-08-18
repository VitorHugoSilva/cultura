<?php

class SeguimentoCultural extends BaseModel
{
    protected $fillable = ['nome'];

    protected $table = 'seguimentos_culturais';

    public static $rules = [
        'nome' => 'required|max:100|unique:seguimentos_culturais'
    ];

    public static $meta = [
        'nome' => 'text|Seguimento Cultural|Seguimento'
    ];
    public static $asOption = ['nome', 'id'];
}
