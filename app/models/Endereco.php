<?php

class Endereco extends BaseModel
{
    protected $guarded = ['id'];
    protected $table = 'enderecos';
    public static $rules = [
        'estado_endereco' => 'required|regex:/^(\w?\s?\d?)+$/u',
        'cidade_endereco' => 'required|regex:/^(\w?\s?\d?)+$/u',
        'bairro_endereco' => 'required|regex:/^(\w?\s?\d?)+$/u',
        'endereco'        => 'required',
        'numero'          => 'required|integer',
        'cep'             => 'required|integer'
    ];


    public function beforeValidate()
    {
        if (Endereco::whereEnderecoAndPessoaId($this->endereco, $this->cidade_id)->notThis()->count()) {
            $this->errors()->add('endereco', 'Endereço Duplicado!');
            return false;
        }
    }

    public function pessoa()
    {
        return $this->belongsTo('Pessoa');
    }

}
