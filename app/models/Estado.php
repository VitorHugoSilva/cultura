<?php

class Estado extends BaseModel
{

    protected $fillable = ['nome', 'sigla', 'pais_id'];

    public static $rules = [
        'nome'  => 'required|max:40|unique:estados|regex:/^(\w?\s?\d?)+$/u',
        'sigla' => 'required|size:2|unique:estados|alpha',
        'pais_id'=>'required|integer'
    ];

    public static $meta = [
        'nome'  => 'text|Nome|Nome do Estado',
        'sigla' => 'text|Sigla|Sigla do Estado',
        'Pais.nome' => 'select|País|Escolha o Pais'

    ];

    public function beforeValidate()
    {
        if (Estado::whereNomeAndPaisId($this->nome, $this->pais_id)->notThis()->count()) {
            $this->errors()->add('pais_id', 'Este estado já existe nesse país');
        }
    }
    public function beforeDelete()
    {
        return ! (bool) $this->cidades()->count();
    }

    public static function options()
    {
        return static::orderBy('nome')->lists('nome', 'id');
    }

    public function pais()
    {
        return $this->belongsTo('Pais');
    }

    public function cidades()
    {
        return $this->hasMany('Cidade');
    }

    public static function search($termo)
    {
        $query = parent::search($termo)->with('pais');

        if(! empty($termo)) {
            $query->orWhereExists(function($query) use($termo) {
                $query->select('id')->from('paises')
                      ->where('nome', 'ilike', "%$termo%")->whereRaw('pais_id = paises.id');
            });
        }        

        return $query->orderBy('nome')->select();
    }

}
