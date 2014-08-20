<?php

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        Cache::forget('menu');
        DB::table('menus')->delete();
        $menu = Menu::create([
                'nome'      =>  'Artistas',
                'url'       =>  '/admin',
                'descricao' =>  'Gerenciamento de artistas',
                'ordem'     =>  '1',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        Menu::create([
                'nome'      =>  'Cadastro de Artistas',
                'menu_id'   =>  $menu->id,
                'url'       =>  'admin/pessoas',
                'descricao' =>  'Cadastro de artistas',
                'ordem'     =>  '1',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        Menu::create([
                'nome'      =>  'Grupos',
                'menu_id'   =>  $menu->id,
                'url'       =>  'admin/grupos',
                'descricao' =>  'Gerenciamento de grupos',
                'ordem'     =>  '2',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        Menu::create([
                'nome'      =>  'Integrantes',
                'menu_id'   =>  $menu->id,
                'url'       =>  'admin/integrantes',
                'descricao' =>  'Gerenciamento de Integrantes dos grupos',
                'ordem'     =>  '3',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        $menu = Menu::create([
                'nome'      =>  'Segmentos',
                'url'       =>  '/admin',
                'descricao' =>  'Gerenciamento de Segmentos Culturais',
                'ordem'     =>  '2',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        Menu::create([
                'nome'      =>  'Categoria de Segmentos',
                'menu_id'   =>  $menu->id,
                'url'       =>  'admin/segmentos_culturais',
                'descricao' =>  'Gerenciamento das categorias dos segmentos',
                'ordem'     =>  '1',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        Menu::create([
                'nome'      =>  'Segmentos',
                'menu_id'   =>  $menu->id,
                'url'       =>  'admin/segmentos_culturais_tipos',
                'descricao' =>  'Gerenciamento dos segmentos',
                'ordem'     =>  '2',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        $menu = Menu::create([
                'nome'      =>  'Usuários',
                'url'       =>  '/admin',
                'descricao' =>  'Gerenciamento dos usuários',
                'ordem'     =>  '3',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        Menu::create([
                'nome'      =>  'Cadastro de Usuários',
                'menu_id'   =>  $menu->id,
                'url'       =>  'admin/usuarios',
                'descricao' =>  'Gerenciamento de permissões',
                'ordem'     =>  '1',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        Menu::create([
                'nome'      =>  'Gerenciamento de Permissões',
                'menu_id'   =>  $menu->id,
                'url'       =>  'admin/',
                'descricao' =>  'Gerenciamento de permissões',
                'ordem'     =>  '1',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        $menu = Menu::create([
                'nome'      =>  'Configurações',
                'url'       =>  '/admin',
                'descricao' =>  'Gerenciamento de usuários',
                'ordem'     =>  '4',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        Menu::create([
                'nome'      =>  'Gerenciar Menus',
                'menu_id'   =>  $menu->id,
                'url'       =>  'admin/menus',
                'descricao' =>  'Gerenciamento de menus',
                'ordem'     =>  '1',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

        $menu = Menu::create([
                'nome'      =>  'Relatórios',
                'url'       =>  '/admin',
                'descricao' =>  'Emissão de Relatórios',
                'ordem'     =>  '5',
                'ativo'     =>   1,
                'icone'     =>  'preencher depois'
        ]);

    }
}