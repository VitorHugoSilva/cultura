    <?php

class Integrante extends BaseModel
{
    protected $fillable = ['nome'];

    protected $table = 'integrantes';

    public static $rules = [
        'nome' => 'required|max:40|unique:estados_civis'
    ];

    public static $meta = [
        'nome' => 'text|Integrante|O estado civil do indivíduo',
        'Grupo.nome' => 'select|Grupo|Selecione a qual grupo artístico ele pertence'
    ];

    public function grupo()
    {
        return $this->belongsTo('Grupo');
    }

    public function pessoas()
    {
        return $this->hasMany('Pessoas');
    }
}
