<?php

use \AcceptanceTester;

abstract class ResourceTester
{

    /**
     * @var \AcceptanceTester
     */
    protected $tester;

    public function _before(\AcceptanceTester $I)
    {
        Artisan::call('migrate');
        Mail::pretend(true);
        $this->tester = $I;
    }

    public function _after(\AcceptanceTester $I)
    {
        Artisan::call('migrate:rollback');
    }

    protected function getTestsList()
    {
        return [
            'testPesquisar'
        ];
    }

    protected function getController()
    {
        return str_replace('TestCest', '', get_called_class());
    }

    protected function getSearchTerms()
    {
        return [];
    }

    protected function getCreateData()
    {
        return [];
    }

    protected function getUpdateData()
    {
        return $this->getCreateData();
    }

    // tests
    // public function testNavegacao(AcceptanceTester $I)
    // {
    //     $this->visit('index');
    //     $I->see($this->getController(), 'h1');
    //     $I->click('Novo');
    //     $I->seeInCurrentUrl('create');
    //     $I->click('Voltar');
    //     $I->seeInCurrentUrl(Str::snake($this->getController()));
    // }

    public function testCriar(AcceptanceTester $I){}

    public function testPesquisar(AcceptanceTester $I)
    {
        $terms = $this->getSearchTerms();
        $this->validarFields($terms);

        $this->visit('index');
        foreach($terms as $termo => $count) {
            $I->fillField('pesquisa', $termo);
            $I->click('#form-pesquisa button[type="submit"]');
            $I->seeInCurrentUrl('?pesquisa=' . urlencode($termo));
            $I->assertEquals($termo, $I->grabValueFrom('#form-pesquisa input[name="pesquisa"]'));

            // $I->
            // vrificar contagem

            $I->click('#form-pesquisa-limpar');
            $I->dontSeeInCurrentUrl('?pesquisa=' . urlencode($termo));
            $I->assertEmpty($I->grabValueFrom('#form-pesquisa input[name="pesquisa"]'));
        }
    }

    public function testCreate(\AcceptanceTester $I){

        $this->beforeCreate($I);

        $data = $this->getCreateData();
        $this->validarFields($data);
        $this->visit('create');
        
        foreach ($data as $name => $value) {
            if(Str::endsWith($name, '_id')){
                $I->selectOption($name, $value);
            }
            else{
                $I->fillField($name, $value);
            }
        }

        $I->click('#form-principal input[type="submit"]');
        $I->seeInCurrentUrl(Str::snake($this->getController())); // ver se redirecionou para a index
        
        foreach ($data as $value) { $I->see($value); }
    }

    protected function beforeCreate(\AcceptanceTester $I){}

    public function testEdit(\AcceptanceTester $I){

        $this->beforeEdit($I);

        $data = $this->getUpdateData();
        $this->validarFields($data);
        $this->visit('edit', [1]);
        
        foreach ($data as $name => $value) {
            if(Str::endsWith($name, '_id')){
                $I->selectOption('#' . $name, $value);
            }
            else{
                $I->fillField('#' . $name, $value);
            }
        }

        $I->click('#form-principal input[type="submit"]');
        $I->seeInCurrentUrl(Str::snake($this->getController())); // ver se redirecionou para a index
        
        foreach ($data as $value) { $I->see($value); }
    }

    protected function beforeEdit(\AcceptanceTester $I){}

    public function testDelete(\AcceptanceTester $I)
    {
        $this->beforeDelete($I);
        $this->visit('index');
        $I->click('Deletar');
        $I->wait(1);
        $I->click('.modal-confirm .modal-confirm-link');
        $I->cantSeeElementInDOM('.table-crud-item');
    }

    protected function beforeDelete(\AcceptanceTester $I){}

    // helpers
    protected function visit($action, array $parameters = null)
    {
        $this->tester->amOnPage(URL::action($this->getController() . 'Controller@' . $action, $parameters, false));
    }

    protected function validarFields($data){
        if(! is_array($data)) {
            $this->fail("Dados devem ser um array no formato `[campo => valor]`");
        }
        else if(empty($data)) {
            $this->tester->fail("Dados não podem ser vazios em " . get_called_class());
        }
    }
}