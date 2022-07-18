<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tarefa extends Model
{
    use HasFactory;
    protected $table = "tarefas";
    protected $fillable =['descricao','cor','grau','data_inicio','hora_inicio','data_fim','hora_fim','funcionario_id','user_id'];

    function getFuncionario(){
        return $this->belongsTo(Funcionario::class,'funcionario_id','id');
    }

    function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
