<?php

class PessoasSegmentos extends BaseModel
{
    protected $table = 'pessoas_segmentos';
    public static $rules = [];

    public static $meta = [];

    public function artista()
    {
        return $this->belongsToMany('Artista');
    }

    public static function segmento()
    {
        return $this->belongsToMany('SegmentoCultural');
    }
}
