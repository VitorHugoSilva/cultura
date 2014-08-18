<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriacaoTabelasDeUsuarioEMenu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table){
			$table->increments('id');
			$table->integer('menu_id')->unsigned()->nullable();
			$table->foreign('menu_id')->references('id')->on('menus');
			$table->string('nome', 60);
			$table->string('url', 255);
			$table->string('descricao', 255);
			$table->integer('ordem');
			$table->boolean('ativo')->default(true);
			$table->string('icone', 150)->default(true);
			$table->timestamps();
		});	


		Schema::create('permissoes', function(Blueprint $table){
			$table->increments('id');	
			$table->string('nome')->unique();
			$table->timestamps();
		});

		Schema::create('users', function(Blueprint $table){
			$table->increments('id');
			$table->string('email', 120)->unique();
			$table->string('password', 251);
			$table->string('remember_token', 251)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menus');		
		Schema::drop('permissoes');
		Schema::drop('users');
	}

}

