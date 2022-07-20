@extends('layouts.app')
@section('titulo', 'Detalhes da tarefa')
@section('conteudo')
<div class="card">
    <div class="card-body">
    <form>
        @include('admin.tarefa.form')
    </form>
    </div>

</div>
@endsection
