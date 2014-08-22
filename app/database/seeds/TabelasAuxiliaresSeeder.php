<?php

class TabelasAuxiliaresSeeder extends Seeder
{
    public function run()
    {
        DB::table('arquivos_tipos')->delete();
        ArquivoTipo::create(['nome' => 'Apresentação']);
        ArquivoTipo::create(['nome' => 'Folder']);
        
    }
}