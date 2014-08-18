<?php

class Bairro extends BaseModel
{
    protected $fillable = ['nome', 'cidade_id'];

    public static $rules = [
        'nome' => 'required|regex:/^(\w?\s?\d?)+$/u',
        'cidade_id' => 'required|integer'
    ];

    public static $meta = [
        'nome' => 'text|Nome|Nome do bairro',
        'Cidade.nome' => 'select|Cidade|Escolha a cidade'
    ];

    public function beforeValidate()
    {
        if (Bairro::whereNomeAndCidadeId($this->nome, $this->cidade_id)->notThis()->count()) {
            $this->errors()->add('nome', 'Bairro já existe na cidade');
            return false;
        }
    }

    public function cidade()
    {
        return $this->belongsTo('Cidade');
    }

    public static function search($termo)
    {
        return parent::search($termo)->orderBy('nome')->with('cidade');
    }
}
