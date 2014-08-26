<?php

class AreaRepresentacao extends BaseModel
{
    protected $fillable = ['nome'];

    protected $table = 'area_representacao';

    public static $rules = [
        'nome' => 'required|max:100|unique:area_representacao'
    ];

    public static $meta = [
        'nome' => 'text|Segmento Cultural|Segmento'
    ];

    public function beforeValidate()
    {
        if (AreaRepresentacao::whereNome($this->nome)->notThis()->count()) {
            $this->errors()->add('nome', 'Área de representação já cadastrado');
            return false;
        }
    }
    
    public function segmentos(){
        return $this->hasMany('SegmentoCultural', 'arearepresentacao_id');
    }
    public static function options()
    {
        return static::orderBy('nome')->lists('nome', 'id');
    }
}
