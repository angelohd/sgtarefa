@extends('layouts.app')
@section('titulo', 'Editar dados da tarefa')
@section('conteudo')
<div class="card">
    <div class="card-body">
    <form method="POST" action="{{ route('tarefa.update',$tarefa->id) }}">
        @include('admin.tarefa.form')
    </form>
    </div>

</div>
@endsection
