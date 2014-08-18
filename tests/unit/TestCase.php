<?php


class TestCase extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    protected function _before()
    {
        Artisan::call('migrate');
        Mail::pretend(true);
    }

    protected function _after()
    {
        Artisan::call('migrate:rollback');
    }
}