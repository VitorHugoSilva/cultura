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
        Schema::create('area_representacao', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });
        
        Schema::create('pessoas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('arearepresentacao_id')->unsigned();
            $table->foreign('arearepresentacao_id')->references('id')->on('area_representacao')->nullable;
            $table->string('nome_artistico')->nullable;
            $table->string('inscricao_estadual')->nullable;
            $table->string('inscricao_municipal')->nullable;
            $table->string('razao_social')->nullable;
            $table->string('nome_fantasia')->nullable;
            $table->string('cpf_responsavel')->nullable;
            $table->string('rg_responsavel')->nullable;
            $table->string('cpf')->nullable;
            $table->string('identidade')->nullable;
            $table->string('cnpj')->nullable;
            $table->date('data_nascimento')->nullable;
            $table->boolean('possui_cadastro_siniic')->default(false)->nullable;
            $table->text('apresentacao')->nullable;
            $table->text('historico')->nullable;
            $table->text('portfolio')->nullable;
            $table->text('necessidade_tecnica')->nullable;
            $table->string('valor_pretendido')->nullable;
            $table->timestamps();
        });

      Schema::create('enderecos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->string('estado_endereco', 100);
            $table->string('cidade_endereco', 100);
            $table->string('bairro_endereco', 100);
            $table->string('endereco')->nullable;
            $table->string('numero')->nullable;
            $table->string('cep')->nullable;
            $table->string('complemento')->nullable;
            $table->timestamps();
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
            $table->timestamps();
        });  
        
         Schema::create('grupos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });

        Schema::create('integrantes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->timestamps();
        });

 
        Schema::create('pessoas_tipos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });                

       
        
        
        
        Schema::create('segmentos_culturais', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->integer('arearepresentacao_id')->unsigned();
            $table->foreign('arearepresentacao_id')->references('id')->on('area_representacao');
            $table->timestamps();
        });

        
        Schema::create('artista_segmento_cultural', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('artista_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('pessoas');
            $table->integer('segmento_cultural_id')->unsigned();
            $table->foreign('segmento_cultural_id')->references('id')->on('segmentos_culturais');
        });
        
        Schema::create('arquivos_tipos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });
        Schema::create('arquivos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->text('arquivo')->nullable;
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->integer('arquivo_tipo_id')->unsigned()->nullable;
            $table->foreign('arquivo_tipo_id')->references('id')->on('arquivos_tipos')->nullable;
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

        Schema::drop('contatos');
        Schema::drop('contatos_tipos');
        Schema::drop('integrantes');
        Schema::drop('grupos');
        Schema::drop('artista_segmento_cultural');
        Schema::drop('segmentos_culturais');
        Schema::drop('arquivos');
        Schema::drop('enderecos');
        Schema::drop('arquivos_tipos');
        Schema::drop('pessoas');
        Schema::drop('pessoas_tipos');
        Schema::drop('area_representacao');
    }

}
