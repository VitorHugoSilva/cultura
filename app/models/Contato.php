<?php

class Contato extends BaseModel
{

    protected $guarded = ['id', 'pessoa_id'];
    protected $table = 'contatos';

    public static $rules = [
        'nome' => 'required|unique:contatos',
        'pessoa_id' => 'required|integer',
        'contato_tipo_id' => 'required|integer'
    ];

    public static $meta = [
        'nome' => 'text|Nome|Nome da cidade',
        'TipoContato.nome' => 'select|Tipo de Contato|Escolha o tipo de contato'
    ];

    public function beforeValidate()
    {
        if (Contato::whereNomeAndPessoaId($this->nome, $this->pessoa_id)->notThis()->count()) {
            $this->errors()->add('estado_id', 'Contato duplicado');
        }
    }

    public function tipoContato()
    {
        return $this->belongsTo('TipoContato');
    }
}
