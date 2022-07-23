@csrf
<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label>Funcionarios *</label>
            <select name="funcionario_id" class="form-control">
                @if(isset($tarefa))
                @foreach ($funcionarios as $funcionario )
                <option value="{{ $funcionario->id }}" @if($tarefa->funcionario_id == $funcionario->id) selected @endif>{{ $funcionario->nome }}</option>
                @endforeach
                @else
                @foreach ($funcionarios as $funcionario )
                <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>Descricao *</label>
          @if(isset($tarefa))
          <textarea name="descricao" class="form-control" required>{{ $tarefa->descricao }} </textarea>
          @else
          <textarea name="descricao" class="form-control" required> </textarea>
          @endif
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Cor:</label>
                    <input type="color" name="cor" class="form-control" required value="{{ $tarefa->cor ?? old('tarefa') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>prioridade:</label>
                    <select name="prioridade" class="form-control">
                        @if(isset($tarefa))
                        <option value="{{ $tarefa->prioridade }}">{{ $tarefa->prioridade }}</option>
                        @endif
                        <option value="Nao Urgente">Nao Urgente</option>
                        <option value="Urgente">Urgente</option>
                    </select>
                </div>
            </div>

        </div>

    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Data inicio:</label>
                    <input type="date" name="data_inicio" class="form-control" required value="{{ $tarefa->data_inicio ?? old ('data_inicio') }}">
                </div>

                <div class="form-group">
                    <label>Data fim:</label>
                    <input type="date" name="data_fim" class="form-control" required value="{{ $tarefa->data_fim ?? old ('data_fim') }}">
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Hora inicio:</label>
                    <input type="time" name="hora_inicio" class="form-control" required value="{{ $tarefa->hora_inicio ?? old ('hora_inicio') }}">
                </div>

                <div class="form-group">
                    <label>hora fim:</label>
                    <input type="time" name="hora_fim" class="form-control" required value="{{ $tarefa->hora_fim ?? old ('hora_fim') }}">
                </div>
            </div>

        </div>

    </div>
    @if(isset($detalhes))
    <hr>
    <div class="col-md-6">
        <div class="form-group">
            <label>Publicado por:</label>
            <input type="text" class="form-control" value="{{ $tarefa->getUser->getFuncionario->nome }}">
        </div>

    </div>
    <div class="col-md-6">
       <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Publicado em:</label>
                <input type="text" class="form-control" value="{{ $tarefa->created_at }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Estado:</label>
                <input type="text" class="form-control" value="{{ $tarefa->estado }}">
            </div>
        </div>

       </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Inicializado em:</label>
                    <input type="text" class="form-control" value="{{ $tarefa->data_inicializado }}">
                </div>
            </div>
            @if($tarefa->estado == "concluido")

            <div class="col-md-6">
                <div class="form-group">
                    <label>Finalizado em:</label>
                    <input type="text" class="form-control" value="{{ $tarefa->data_finalizado }}">
                </div>
            </div>
            @endif

           </div>


    </div>
    @endif

    <div class="col-md-12">
        <div class="card-footer">
            <a href="{{ route('tarefa.index')}}" class="btn btn-info"> Ver Todas as tarefas</a>
            @if(isset($detalhes))
            @if($tarefa->estado == "Agendada")
                @can('updatetarefa')
                <a href="{{ route('tarefa.edit',$tarefa->id)}}" class="btn btn-success">Editar</a>
                @endcan
            @endif
            @else
            <button class="btn btn-primary" type="submit">Salvar</button>
            @endif
            @if($tarefa->estado == "concluido")
                <button class="btn btn-primary" type="button">Aprovar</button>
                <button class="btn btn-danger" type="button">Reprovar</button>
            @endif
        </div>
    </div>


</div>
