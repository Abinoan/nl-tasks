<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo', 100);
            $table->text('descricao');
            $table->date('inicio_estimado')->nullable(true);
            $table->string('inicio_estimado_hora', 5)->nullable(true) ;
            $table->date('termino_estimado')->nullable(true);
            $table->string('termino_estimado_hora', 5)->nullable(true) ;
            $table->date('inicio_real')->nullable(true) ;
            $table->string('inicio_real_hora', 5)->nullable(true) ;
            $table->date('termino_real')->nullable(true) ;         
            $table->string('termino_real_hora', 5)->nullable(true);   
            $table->text('resultado_encontrado')->nullable(true);
            $table->text('resultado_esperado')->nullable(true);
            $table->unsignedBigInteger('situacao_id')->nullable(true);;
            $table->unsignedBigInteger('cliente_id')->nullable(true);
            $table->unsignedBigInteger('projeto_id');
            $table->foreign('projeto_id')->references('id')->on('projetos');
            $table->foreign('situacao_id')->references('id')->on('situacoes');
            $table->foreign('cliente_id')->references('id')->on('clientes');            
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
        Schema::dropIfExists('atividades');
    }
}
