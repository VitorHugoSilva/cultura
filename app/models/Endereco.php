<?php

class Endereco extends BaseModel
{
    protected $guarded = ['id', 'pessoa_id'];
    protected $table = 'enderecos';
    public static $rules = [];

    public function pessoa()
    {
        return $this->belongsTo('Pessoa');
    }

}
