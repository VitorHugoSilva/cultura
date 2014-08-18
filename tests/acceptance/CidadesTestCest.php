<?php

class CidadesTestCest extends ResourceTester
{
    protected function getSearchTerms()
    {
        return ['Macapá' => 1];
    }

    protected function getCreateData()
    {
        return ['nome' => 'Macapa','estado_id' => 'Amapa'];
    }

    protected function getUpdateData()
    {
        return ['nome' => 'xxxxxx','estado_id' => 1];
    }

    protected function getDeleteData()
    {
        return [1];
    }

    protected function beforeCreate(\AcceptanceTester $I)
    {
        $this->tester->haveInDatabase('paises', ['nome' => 'Brasil', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
        $this->tester->haveInDatabase('estados', ['pais_id' => 1,'nome' => 'Amapa', 'sigla' => 'AP', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
    }

    protected function beforeEdit(\AcceptanceTester $I)
    {
        $this->beforeCreate($I);
        $this->tester->haveInDatabase('cidades',  ['nome' => 'Macapa', 'estado_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
    }

    protected function beforeDelete(\AcceptanceTester $I)
    {
        $this->beforeEdit($I);
    }
}