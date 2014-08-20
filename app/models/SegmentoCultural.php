<?php

class SegmentoCultural extends BaseModel
{
    protected $fillable = ['nome'];

    protected $table = 'segmentos_culturais';

    public static $rules = [
        'nome' => 'required|max:100|unique:segmentos_culturais'
    ];

    public static $meta = [
        'nome' => 'text|Segmento Cultural|Segmento'
    ];

     public static function options()
    {
        return static::orderBy('nome')->lists('nome', 'id');
    }
}
