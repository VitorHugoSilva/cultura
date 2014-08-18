	<?php

class EstadoCivil extends BaseModel
{
    protected $fillable = ['nome'];

    protected $table = 'estados_civis';

    public static $rules = [
        'nome' => 'required|max:40|unique:estados_civis'
    ];

    public static $meta = [
        'nome' => 'text|Estado Civil|O estado civil do indivíduo'
    ];
}
