<?php

class TipoContatoSeeder extends Seeder
{
    public function run()
    {   
        DB::table('arquivos_tipos')->delete();
        ContatoTipo::create(['nome' => 'Email']);
        ContatoTipo::create(['nome' => 'Telefone Residencial']);
        ContatoTipo::create(['nome' => 'Telefone Residencial']);
    }
}