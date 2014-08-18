<?php

class Menu extends Eloquent
{
    protected $fillable = ['nome', 'url', 'icone', 'descricao', 'ordem', 'ativo'];

    public function scopePrincipais($query)
    {
        return $query->whereNull('menu_id')->orderBy('ordem');
    }

    public function scopeSemDescricao($query)
    {
        return $query->where('descricao', '=', '');
    }

    public function filhos()
    {
        return $this->hasMany('Menu');
    }

    public function superior()
    {
        return $this->hasOne('Menu', 'id', 'menu_id');
    }

    public function superiores()
    {
        $trilha = [];
        $trilha[] = $s = $this;

        while ($s = $s->superior()->first()) {
            $trilha[] = $s;
        }

        return array_reverse($trilha);
    }

    public function podeDeletar()
    {
        return !$this->filhos()->count();
    }

}
