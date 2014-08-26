<?php

class SegmentoCultural extends BaseModel
{
    protected $fillable = ['nome', 'arearepresentacao_id'];

    protected $table = 'segmentos_culturais';

    public static $rules = [
        'nome' => 'required|max:100|unique:segmentos_culturais',
        'arearepresentacao_id'=>'required|integer'
    ];

    public static $meta = [
        'nome' => 'text|Segmento Cultural|Segmento',
        'AreaRepresentacao.nome' => 'select|Área de Representação|Escolha o Segmento'
    ];

    public function beforeValidate()
    {
        if (SegmentoCultural::whereNomeAndArearepresentacaoId($this->nome, $this->arearepresentacao_id)->notThis()->count()) {
            $this->errors()->add('nome', 'Segmento Cultural já cadastrado para este Segmento');
            return false;
        }
    }
    public function arearepresentacao()
    {
        return $this->belongsTo('AreaRepresentacao', 'arearepresentacao_id');
    }
     public static function options()
    {
        return static::orderBy('nome')->lists('nome', 'id');
    }
}
