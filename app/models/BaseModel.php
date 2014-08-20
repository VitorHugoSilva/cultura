<?php

abstract class BaseModel extends \LaravelBook\Ardent\Ardent
{
    // use MultiTenantTrait

    protected $validated = false;

    public static $meta = [];

    public static $asOption = ['id', 'id'];

    public static $customMessages = [
        'required'  => 'O campo :attribute não pode ser vazio',
        'alpha_num' => 'O campo :attribute deve conter apenas letras e números',
        'unique'    => 'Já existe um registro com o(a) mesmo(a) :attribute',
        'size'      =>  'O campo :attribute precisa ter :size caracteres.',
        'max'       => 'O campo :attribute não pode ser maior que :max caracteres',
        'email'     =>  'O campo :attribute deve ser um email válido'
    ];

    public static function meta()
    {
        $metadata = [];
        foreach (static::$meta as $campo => $metas) {
            $meta = new \stdClass;
            $meta->name = $campo;
            list($meta->type, $meta->label, $meta->placeholder) = explode('|', $metas);
            $metadata[] = $meta;
        }

        return $metadata;
    }

    public function scopeNotThis($query)
    {
        if ($this->id) return $query->where('id', '!=', $this->id);
        else return $query;
    }

    public static function search($termo)
    {
        $query = self::select();
        if (! empty($termo)) {
            if (is_numeric($termo)) { $query->orWhere('id', '=', $termo); }
            $table = (new static)->getTable();
            foreach (self::meta() as $campo) {
                $field_name = $table . '.' . $campo->name;
                if ('number' == $campo->type) {
                    if (is_numeric($termo)) {
                        $query->orWhere($field_name, $termo);
                    }
                } elseif ('text' == $campo->type) {
                    $query->orWhere($field_name, 'ilike', '%' . preg_replace('#\s+#', '%', $termo). '%');
                }
            }
        }

        return $query;
    }

    public static function options()
    {
        return call_user_func_array(get_called_class() . '::lists', static::$asOption);
    }
}
