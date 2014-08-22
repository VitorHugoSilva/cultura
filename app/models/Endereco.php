<?php

class Endereco extends BaseModel
{
    protected $guarded = ['id', 'pessoa_id'];
    protected $table = 'enderecos';
    public static $rules = [
        'estado_endereco' => 'required|regex:/^(\w?\s?\d?)+$/u',
        'cidade_endereco' => 'required|regex:/^(\w?\s?\d?)+$/u',
        'bairro_endereco' => 'required|regex:/^(\w?\s?\d?)+$/u',
        'endereco'        => 'required',
        'numero'          => 'required|integer',
        'cep'             => 'required|integer',
        'pessoa_id'       => 'required|integer'
    ];

    public function pessoa()
    {
        return $this->belongsTo('Pessoa');
    }

}
