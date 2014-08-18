<?php

class MenuTest extends TestCase
{

    protected $fixtures = [
        'menu-principal' => [
            'nome' => 'Principal',
            'descricao' => 'Menu principal da aplicação',
            'url' => '/',
            'ordem' => 1
        ]
    ];

    public function testeMenu()
    {
        $menu = Menu::create($this->fixtures['menu-principal']);
        $menu_a = $menu->filhos()->create(['nome' => 'item a','descricao' => 'item a','url' => '/a','ordem' => 2]);
        $menu->filhos()->create(['nome' => 'item b','descricao' => 'item b','url' => '/a','ordem' => 3]);

        Menu::create(['nome' => 'RH','descricao' => 'RH','url' => '/rh','ordem' => 2]);

        $this->assertCount(2, $menu->filhos()->get());
        $this->assertEquals('item a', $menu->filhos()->first()->nome);
        $this->assertEquals('Principal', $menu->filhos()->first()->superior()->first()->nome);

        $this->assertFalse($menu->podeDeletar());
        $this->assertTrue($menu_a->podeDeletar());
    }
}