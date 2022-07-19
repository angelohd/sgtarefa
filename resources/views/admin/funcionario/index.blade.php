@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('dist/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ url('dist/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('conteudo')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Lista de funcionarios</h3>
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav ml-auto">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-lg"> Novo</button>
      </ul>
      </nav>
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('funcionarios.store') }}" method="POST">

                <div class="modal-header">
                <h4 class="modal-title">Registar novo funcionario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                    @include('admin.funcionario.form')

                </div>
                <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Categoria</th>
              <th>Email</th>
              <th>Acao</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($funcionarios as $funcionario )
                <tr>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->telefone }}</td>
                    <td>{{ $funcionario->getCategoria->categoria }}</td>
                    <td>{{ $funcionario->getUser->email }}</td>
                    <td> <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-lg-{{ $funcionario->id }}"> Editar</button></td>
                </tr>
                <div class="modal fade" id="modal-lg-{{ $funcionario->id }}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="{{ route('funcionarios.update',$funcionario->id) }}" method="POST">

                            <div class="modal-header">
                            <h4 class="modal-title">Editaro funcionario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">

                                @include('admin.funcionario.form')

                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>

                @empty

                @endforelse

            </tbody>
        </table>
    </div>
  </div>
  @section('js')
  <script src="{{ url('dist/plugins/select2/js/select2.full.min.js') }}"></script>
  @endsection
@endsection
