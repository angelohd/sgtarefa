@extends('layouts.app')
@section('conteudo')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Lista de tarefas</h3>
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav ml-auto">
        @can('addtarefa')
        <a href="{{ route('tarefa.create') }}" class="btn btn-primary">Nova tarefa</a>
        @endcan

      </ul>
      </nav>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Funcionario</th>
              <th>Descricao</th>
              <th>Prioridade</th>
              <th>Estado</th>
              <th>Publicado por.</th>
              <th>Acao</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa )
                    <tr>
                        <td>{{ $tarefa->getFuncionario->nome }}</td>
                        <td>{{ substr($tarefa->descricao,0,20) }}...</td>
                        <td>{{ $tarefa->prioridade }}</td>
                        <td>{{ $tarefa->estado }}</td>
                        <td>{{ $tarefa->getUser->getFuncionario->nome }}</td>
                        <td>
                            @can('viewtarefa')
                            <a href="{{ route('tarefa.show',$tarefa->id) }}" class="btn btn-info">Detalhes</a>
                            @else
                            <a href="#" class="btn btn-info">Detalhes</a>
                            @endcan

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
  </div>
  @section('js')
  <script src="{{ url('dist/plugins/select2/js/select2.full.min.js') }}"></script>
  @endsection
@endsection
