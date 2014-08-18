<?php

class EstadosTestCest extends ResourceTester
{
    protected function getSearchTerms()
    {
        return ['Amapá' => 1];
    }

    protected function getCreateData()
    {
        return ['nome' => 'Amapa', 'sigla' => 'AP', 'pais_id' => 'Brasil' ];
    }

    protected function getUpdateData()
    {
        return ['nome' => 'xxxxxx', 'sigla' => 'YY', 'pais_id' => 1];
    }

    protected function getDeleteData()
    {
        return [1];
    }

    protected function beforeCreate(\AcceptanceTester $I)
    {
        $this->tester->haveInDatabase('paises', ['nome' => 'Brasil', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
    }

    protected function beforeEdit(\AcceptanceTester $I)
    {
        $this->beforeCreate($I);
        $this->tester->haveInDatabase('estados',  ['nome' => 'Amapa', 'sigla' => 'AP', 'pais_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
    }

    protected function beforeDelete(\AcceptanceTester $I)
    {
        $this->beforeEdit($I);
    }

}