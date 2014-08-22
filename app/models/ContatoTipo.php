<?php

class ContatoTipo extends BaseModel
{
    protected $fillable = ['nome'];
    protected $table = "contatos_tipos";
    public static $rules = [
        'nome' => 'required|regex:/^(\w?\s?\d?)+$/u',
    ];

    public static $meta = [
        'nome' => 'text|Nome|Nome do Tipo '
    ];

    public function beforeValidate()
    {
        if (ContatoTipo::whereNome($this->nome)->notThis()->count()) {
            $this->errors()->add('nome', 'Já existe este tipo de contato');
            return false;
        }
    }
    
    public static function search($termo)
    {
        return parent::search($termo)->orderBy('nome');
    }
    
         public static function options()
    {
        return static::orderBy('nome')->lists('nome', 'id');
    }
}
