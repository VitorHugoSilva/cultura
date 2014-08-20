<?php

class SegmentoCulturalTipo extends BaseModel
{
    protected $fillable = ['nome','segmentocultural_id'];

    protected $table = 'segmentos_culturais_tipos';

    public static $rules = [
        'nome' => 'required|max:100|unique:segmentos_culturais_tipos',
        'segmentocultural_id'=>'required|integer'
    ];

    public static $meta = [
        'nome' => 'text|Segmento Cultural|Segmento',
        'SegmentoCultural.nome' => 'select|Segmento|Escolha o Segmento'
    ];

    public function beforeValidate()
    {
        if (SegmentoCulturalTipo::whereNomeAndSegmentoculturalId($this->nome, $this->segmentocultural_id)->notThis()->count()) {
            $this->errors()->add('nome', 'Segmento Cultural já cadastrado para este Segmento');
            return false;
        }
    }
    public function segmentocultural()
    {
        return $this->belongsTo('SegmentoCultural');
    }

    public static function options()
    {
        return static::orderBy('nome')->lists('nome', 'id');
    }


}
