<?php

class EnderecoTest extends TestCase
{
    public function testEstadoCidade()
    {
        Estado::create(['nome'=>'Amapá','sigla'=>'AP']);
        $this->assertCount(1, Estado::where('nome','=','Amapá')->get());
        
        $estado_a = Estado::where('nome','=','Amapá')->first();
        $estado_a->cidades()->create(['nome'=>'Macapá']);
        $estado_a->cidades()->create(['nome'=>'Santana']);

        $estado_b = Estado::create(['nome'=>'Pará','sigla'=>'PA']);
        $estado_b->cidades()->create(['nome'=>'Belém']);

        $this->assertCount(2, $estado_a->cidades()->get());
        $cidades = $estado_a->cidades()->get();
        $this->assertEquals('Macapá',  $cidades->get(0)->nome);
        $this->assertEquals('Santana', $cidades->get(1)->nome);

        $cidade = Cidade::whereNome('Macapá')->first();
        $this->assertEquals('Amapá',$cidade->estado()->first()->nome);
    }

    public function testCidadeBairro()
    {
        Estado::create(['nome'=>'Amapá','sigla'=>'AP'])
            ->cidades()->create(['nome'=>'Macapá'])
                ->bairros()->createMany([['nome'=>'Zerão'], ['nome'=>'Universidade']]);

        $bairros = Cidade::whereNome('Macapá')->first()->bairros()->get();

        $this->assertEquals('Zerão',$bairros->get(0)->nome);
        $this->assertEquals('Universidade',$bairros->get(1)->nome);
        $this->assertEquals('Macapá',$bairros->get(0)->cidade()->first()->nome);

    }

    public function testBairroValidation()
    {
        Estado::create(['nome'=>'Amapá','sigla'=>'AP'])
            ->cidades()->createMany([
                ['nome'=>'Macapá'],
                ['nome'=>'Santana']
            ]);

        $bairro = new Bairro();
        $bairro->cidade_id = 1;
        $bairro->nome = 'Jardim II';
        $this->assertTrue($bairro->save());
        $bairro->nome = 'Zerão';
        $this->assertTrue($bairro->save());
        $bairro->nome = '%#';
        $this->assertFalse($bairro->save());
        $bairro->nome = '  ';
        $this->assertFalse($bairro->save());

        $bairro = new Bairro;
        $bairro->nome = 'Zerão';
        $bairro->cidade_id = 1;
        $this->assertFalse($bairro->save());

        $bairro->cidade_id = 2;
        $this->assertTrue($bairro->save());
    }

    public function testCidadeValidation()
    {
        Estado::create(['nome'=>'Amapá','sigla'=>'AP']);
        Estado::create(['nome'=>'Pará','sigla'=>'PA']);

        $cidade = new Cidade();
        $cidade->estado_id = 1;
        $cidade->nome = 'Macapá';
        $this->assertTrue($cidade->save());
        $cidade->nome = 'Pedra Branca';
        $this->assertTrue($cidade->save());
        $cidade->nome = '#$%';
        $this->assertFalse($cidade->save());
        $cidade->nome = '  ';
        $this->assertFalse($cidade->save());

        $cidade = new Cidade;
        $cidade->nome = 'Pedra Branca';
        $cidade->estado_id = 1;
        $this->assertFalse($cidade->save());

        $cidade->estado_id = 2;
        $this->assertTrue($cidade->save());
    }
}