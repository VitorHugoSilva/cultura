<?php

class Arquivo extends BaseModel
{
    protected $fillable = ['nome', 'arquivo', 'arquivo_tipo_id'];
    protected $table = 'arquivos';
    public static $rules = [
        'nome' => 'required|unique:arquivos',
    ];


   
    public function artista(){
        return $this->belongsTo('Artista');
    }

    public static function search($termo)
    {
        return parent::search($termo)->orderBy('nome')->with('cidade');
    }
}
