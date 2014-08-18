<?php

class SeguimentoCulturalTipo extends BaseModel
{
    protected $fillable = ['nome','seguimento_cultural_id'];

    protected $table = 'seguimentos_culturais_tipos';

    public static $rules = [
        'nome' => 'required|max:100|unique:seguimentos_culturais_tipos',
        'seguimento_cultural_id'=>'required|integer'
    ];

    public static $meta = [
        'nome' => 'text|Seguimento Cultural|Seguimento',
        'SeguimentoCultural.nome' => 'select|Seguimento|Escolha o Seguimento'
    ];

    public function beforeValidate()
    {
        if (SeguimentoCulturalTipo::whereNomeAndSeguimentoCulturalId($this->nome, $this->seguimento_cultural_id)->notThis()->count()) {
            $this->errors()->add('nome', 'Seguimento já cadastrado');
            return false;
        }
    }
    public function seguimentoCultural()
    {
        return $this->belongsTo('SeguimentoCultural');
    }
    public static function options()
    {
        return static::orderBy('nome')->lists('nome', 'id');
    }
    public static function create(array $atribus){
         var_dump($atribus);
         exit();
    }
}
