<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Funcionario extends Model
{
    use HasFactory;
    protected $table ="funcionarios";
    protected $fillable = ['nome','telefone','categoria_id'];

    function getCategoria(){
        BelongsToMany(Categoria::class,'categoria_id','id');
    }

    function getTarefa(){
        BelongsToMany(Tarefa::class,'id','funcionario_id');
    }
}
