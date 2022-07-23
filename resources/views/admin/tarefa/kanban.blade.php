@extends('layouts.app')
@section('titulo', 'Minhas Tarefas')
@section('css')
<style>
    .scroll {
    max-height: 350px;
    overflow-y: auto;
}
</style>
@endsection
@section('conteudo')

<div class="kanban">
    <div class="row">

        <div class="col-sm-4">
            <div class="card card-row card-default">
                <div class="card-header bg-defautl">
                  <h3 class="card-title">
                   Agendada
                  </h3>
                </div>
                <div class="card-body scroll">
                    @forelse ($tarefasAgendadas as $tarefa)
                    <div class="card card-light card-outline" style="background: {{ $tarefa->cor }}">
                        <div class="card-body">
                          <p> {{ substr($tarefa->descricao,0,50) }}...</p>
                        </div>
                        <div class="card-footer">
                            <label>Prioridade: {{ $tarefa->prioridade }}</label><br>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg-{{ $tarefa->id }}">
                                Mais detalhes ...
                              </button>
                          </div>
                      </div>
                      <div class="modal fade" id="modal-lg-{{ $tarefa->id }}">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header" style="background: {{ $tarefa->cor }}">
                              <h4 class="modal-title">{{ $tarefa->getFuncionario->nome }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                             @include('admin.tarefa.detalhes')
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                              <button type="button" class="btn btn-primary" onclick="iniciar_tarefa({{ $tarefa->id }})">Iniciar Tarefa</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    @empty
                        <p>Nada encontrado!!!</p>

                    @endforelse

                </div>
              </div>

        </div>

        <div class="col-sm-4">
            <div class="card card-row card-default">
                <div class="card-header bg-info">
                  <h3 class="card-title">
                   Fazendo
                  </h3>
                </div>
                <div class="card-body scroll">
                    @forelse ($tarefasFazendos as $tarefa)
                    <div class="card card-light card-outline" style="background: {{ $tarefa->cor }}">
                        <div class="card-body">
                          <p> {{ substr($tarefa->descricao,0,50) }}...</p>
                        </div>
                        <div class="card-footer">
                            <label>Prioridade: {{ $tarefa->prioridade }}</label><br>
                            <label>Inicializado: {{ $tarefa->data_inicializado }}</label><br>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg-{{ $tarefa->id }}">
                                Mais detalhes ...
                              </button>
                          </div>
                      </div>
                      <div class="modal fade" id="modal-lg-{{ $tarefa->id }}">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header" style="background: {{ $tarefa->cor }}">
                              <h4 class="modal-title">{{ $tarefa->getFuncionario->nome }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                             @include('admin.tarefa.detalhes')
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                              <button type="button" class="btn btn-primary" onclick="concluir_tarefa({{ $tarefa->id }})">Concluir Tarefa</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    @empty
                        <p>Nada encontrado!!!</p>
                    @endforelse
                </div>
              </div>

        </div>

        <div class="col-sm-4">
            <div class="card card-row card-default">
                <div class="card-header bg-success">
                  <h3 class="card-title">
                   Concluido
                  </h3>
                </div>
                <div class="card-body scroll">
                    @forelse ($tarefasConcluidos as $tarefa)
                    <div class="card card-light card-outline" style="background: {{ $tarefa->cor }}">
                        <div class="card-body">
                          <p> {{ substr($tarefa->descricao,0,50) }}...</p>
                        </div>
                        <div class="card-footer">
                            <label>Prioridade: {{ $tarefa->prioridade }}</label><br>
                            <label>Concluido: {{ $tarefa->data_finalizado }}</label><br>
                          </div>
                      </div>
                    @empty
                        <p>Nada encontrado!!!</p>
                    @endforelse
                </div>
              </div>

        </div>

        <div class="col-sm-4">
            <div class="card card-row card-default">
                <div class="card-header bg-primary">
                  <h3 class="card-title">
                   Aprovada
                  </h3>
                </div>
                <div class="card-body scroll">
                    @forelse ($tarefasAprovadas as $tarefa)
                    <div class="card card-light card-outline" style="background: {{ $tarefa->cor }}">
                        <div class="card-body">
                          <p> {{ substr($tarefa->descricao,0,50) }}...</p>
                        </div>
                        <div class="card-footer">
                            <label>Prioridade: {{ $tarefa->prioridade }}</label><br>
                          </div>
                      </div>
                    @empty
                        <p>Nada encontrado!!!</p>
                    @endforelse
                </div>
              </div>
        </div>

        <div class="col-sm-4">
            <div class="card card-row card-default">
                <div class="card-header bg-dark">
                  <h3 class="card-title">
                    Reprovado
                  </h3>
                </div>
                <div class="card-body scroll">
                    @forelse ($tarefasReprovadas as $tarefa)
                    <div class="card card-light card-outline" style="background: {{ $tarefa->cor }}">
                        <div class="card-body">
                          <p> {{ substr($tarefa->descricao,0,50) }}...</p>
                        </div>
                        <div class="card-footer">
                            <label>Prioridade: {{ $tarefa->prioridade }}</label><br>
                          </div>
                      </div>
                    @empty
                        <p>Nada encontrado!!!</p>
                    @endforelse
                </div>
              </div>
        </div>

        <div class="col-sm-4">
            <div class="card card-row card-default">
                <div class="card-header bg-danger">
                  <h3 class="card-title">
                    Perdida
                  </h3>
                </div>
                <div class="card-body scroll">
                    @forelse ($tarefasPerdidas as $tarefa)
                    <div class="card card-light card-outline" style="background: {{ $tarefa->cor }}">
                        <div class="card-body">
                          <p> {{ substr($tarefa->descricao,0,50) }}...</p>
                        </div>
                        <div class="card-footer">
                            <label>Prioridade: {{ $tarefa->prioridade }}</label><br>
                          </div>
                      </div>
                    @empty
                        <p>Nada encontrado!!!</p>
                    @endforelse
                </div>
              </div>

        </div>

    </div>
</div>
@include('admin.tarefa.acoes')

@endsection
