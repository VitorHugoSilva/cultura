    <?php

class Integrante extends BaseModel
{
    protected $fillable = ['pessoa_id', 'grupo_id'];

    protected $table = 'integrantes';

    public static $meta = [
        'Artista.nome' => 'select|Integrante|O estado civil do indivíduo',
        'Grupo.nome' => 'select|Grupo|Selecione a qual grupo artístico ele pertence'
    ];



    public function grupo()
    {
        return $this->belongsToMany('Grupo', 'grupos');
    }

    public function artista()
    {
        return $this->belongsToMany('Artista', 'pessoas');
    }

    public static function search($termo){
        return self::select();
    }
}
