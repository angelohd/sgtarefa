@extends('layouts.app')
@section('titulo', 'Nova Tarefa')
@section('conteudo')
<div class="card">
    <div class="card-body">
    <form action="{{ route('tarefa.store') }}" method="POST">
        @include('admin.tarefa.form')
    </form>
    </div>

</div>
@endsection
