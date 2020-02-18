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
            $table->date('inicio_estimado') ;
            $table->string('inicio_estimado_hora', 5) ;
            $table->date('termino_estimado') ;
            $table->string('termino_estimado_hora', 5) ;
            $table->date('inicio_real') ;
            $table->string('inicio_real_hora', 5) ;
            $table->date('termino_real') ;         
            $table->string('termino_real_hora', 5) ;   
            $table->unsignedBigInteger('situacao_id');
            $table->unsignedBigInteger('cliente_id')->nullable(true);
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos');
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
