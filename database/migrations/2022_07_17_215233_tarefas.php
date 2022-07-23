<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tarefas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('descricao');
            $table->string('cor');
            $table->date('data_inicio');
            $table->time('hora_inicio');
            $table->date('data_fim');
            $table->time('hora_fim');
            $table->enum('estado',['Agendada','Fazendo','concluido','Aprovado','Reprovado','Perdida','Reijeitada'])->default('Agendada');
            $table->enum('prioridade',['Urgente','Nao Urgente'])->default('Nao Urgente');
            $table->timestamp('data_inicializado')->nullable(); //data em que eh tarefa iniciada
            $table->timestamp('data_finalizado')->nullable(); //data em que a tarefa eh finalizada
            $table->timestamp('data_correcao')->nullable(); //data da corecao aprovado e reprovado
            $table->timestamp('data_rejeitar')->nullable(); //data em que a terefa foi rejeitada
            $table->timestamp('data_perder')->nullable(); //data em que a tarefa foi perdida
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
