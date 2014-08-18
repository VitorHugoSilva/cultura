<?php

class Grupo extends BaseModel
{
    protected $fillable = ['nome'];

    protected $table = 'grupos';

    public static $rules = [
        'nome' => 'required|max:40|unique:grupos'
    ];

    public static $meta = [
        'nome' => 'text|Grupo|O grupo do ínviduo'
    ];
}
