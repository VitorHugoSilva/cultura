<?php

class PessoasSegmentos extends BaseModel
{
    protected $table = 'artista_segmento_cultural';
    public static $rules = [];
    protected $fillable = [
        'segmento_cultural_id',
        'artista_id'
    ];

    public static $meta = [];

    public function artista()
    {
        return $this->belongsToMany('Artista', 'pessoa_id');
    }

    public static function segmento()
    {
        return $this->belongsToMany('SegmentoCultural');
    }
}
