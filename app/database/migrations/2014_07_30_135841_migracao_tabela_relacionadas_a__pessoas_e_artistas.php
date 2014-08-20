<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigracaoTabelaRelacionadasAPessoasEArtistas extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paises', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });

        Schema::create('estados', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome', 100)->unique();
            $table->string('sigla', 2)->unique();
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('paises');
            $table->timestamps();
        });

        Schema::create('cidades', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->unique(['nome', 'estado_id']);
            $table->timestamps();
        });

        Schema::create('bairros', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome', 100);
            $table->integer('cidade_id')->unsigned();   
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->unique(['nome', 'cidade_id']);
            $table->timestamps();   
        });     
        Schema::create('pessoas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->timestamps();
        });

        Schema::create('estados_civis', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->timestamps();
        });

        Schema::create('cores', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 40)->unique();
            $table->timestamps();
        });
        Schema::create('sedes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 40)->unique();
            $table->timestamps();
        });

        Schema::create('dados_gerais', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->integer('estadonascimento_id')->unsigned();
            $table->foreign('estadonascimento_id')->references('id')->on('estados');
            $table->string('nacionalidade')->nullable;
            $table->string('cpf')->nullable;
            $table->string('cnpj')->nullable;
            $table->date('data_nascimento');
            $table->string('local_nascimento')->nullable;
            $table->integer('estadocivil_id')->unsigned();
            $table->foreign('estadocivil_id')->references('id')->on('estados_civis');
            $table->integer('cor_id')->unsigned();
            $table->foreign('cor_id')->references('id')->on('estados');
            $table->integer('sede_id')->unsigned();
            $table->foreign('sede_id')->references('id')->on('sedes');
        });

        Schema::create('documentos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->string('identidade')->nullable;
            $table->date('data_emissao')->nullable;
            $table->string('orgao_emissor')->nullable;
            $table->string('registro_nascimento')->nullable;
            $table->string('cartorio')->nullable;            
            $table->string('uf_emissor')->nullable;
            $table->string('livro_certidao')->nullable;
            $table->string('folha_certidao')->nullable;
            $table->string('titulo_eleitor')->nullable;
            $table->string('zona_titulo')->nullable;
            $table->string('secao_titulo')->nullable;
            $table->string('documento_militar')->nullable;
            $table->string('pis_pasep')->nullable;
            $table->string('matricula')->nullable;
        });
         Schema::create('enderecos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->string('endereco')->nullable;
            $table->string('numero')->nullable;
            $table->integer('bairro_id')->unsigned();
            $table->foreign('bairro_id')->references('id')->on('bairros');
            $table->string('cep')->nullable;
            $table->string('complemento')->nullable;
            $table->string('endereco_comercial')->nullable;
            $table->string('numero_comercial')->nullable;
        });   

        Schema::create('contatos_tipos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->timestamps();
        }); 

        Schema::create('contatos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->string('nome')->nullable;
            $table->integer('contato_tipo_id')->unsigned();
            $table->foreign('contato_tipo_id')->references('id')->on('contatos_tipos');
        });  

        Schema::create('atividades', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->timestamps();
        });  

        Schema::create('cargos_tipos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->timestamps();
        });

        Schema::create('entegrantes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->string('funcao')->unique();
            $table->timestamps();
        });

        Schema::create('escolaridades', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->timestamps();
        });  

 
        Schema::create('pessoas_tipos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });                

        Schema::create('grupos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });

        Schema::create('segmentos_culturais', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });
        Schema::create('segmentos_culturais_tipos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->integer('segmentocultural_id')->unsigned();
            $table->foreign('segmentocultural_id')->references('id')->on('segmentos_culturais');
            $table->timestamps();
        });

        Schema::create('arquivos_tipos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });
        Schema::create('arquivos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->binary('arquivo')->nullable;
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->integer('arquivo_tipo_id')->unsigned();
            $table->foreign('arquivo_tipo_id')->references('id')->on('arquivos_tipos');
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
        
    }

}
