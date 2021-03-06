<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('MenusTableSeeder');
        $this->call('ArquivosTiposSeeder');
        $this->call('AreaRepresentacaoSeeder');
        $this->call('TipoContatoSeeder');
	}

}
