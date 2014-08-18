<?php

class Cor extends BaseModel
{
    protected $fillable = ['nome'];

    protected $table = 'cores';

    public static $rules = [
        'nome' => 'required|max:40|unique:cores'
    ];

    public static $meta = [
        'nome' => 'text|Cor / Raça|A cor do indivíduo'
    ];
}
