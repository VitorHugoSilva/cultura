<?php

class Cidade extends BaseModel
{

    protected $fillable = ['nome', 'estado_id'];

    public static $rules = [
        'nome' => 'required|regex:/^(\w?\s?\d?)+$/u',
        'estado_id' => 'required|integer'
    ];

    public static $meta = [
        'nome' => 'text|Nome|Nome da cidade',
        'Estado.nome' => 'select|Estado|Escolha o estado'
    ];

    public function beforeValidate()
    {
        if (Cidade::whereNomeAndEstadoId($this->nome, $this->estado_id)->notThis()->count()) {
            $this->errors()->add('estado_id', 'Cidade já existe no estado');
        }
    }

    public static function search($termo)
    {
        $query = parent::search($termo)->with('estado');

        if(! empty($termo)) {
            $query->orWhereExists(function($query) use($termo) {
                $query->select('id')->from('estados')
                      ->where('nome', 'ilike', "%$termo%")->whereRaw('estado_id = estados.id');
            });
        }        

        return $query->orderBy('nome')->select();
    }

    public function estado()
    {
        return $this->belongsTo('Estado');
    }

    public function bairros()
    {
        return $this->hasMany('Bairro');
    }

    public static function options()
    {
        return static::orderBy('nome')->lists('nome', 'id');
    }
}
