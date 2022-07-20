@csrf
<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label>Nome *</label>
            <input type="text" class="form-control" required name="nome" value="{{ $funcionario->nome ?? old('nome') }}">
        </div>

        <div class="form-group">
            <label>Telefone *</label>
            <input type="text" class="form-control" required name="telefone" value="{{ $funcionario->telefone ?? old ('telefone') }}">
            </select>
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Categoria *</label>
            <select class="form-control select2" style="width: 100%;" name="categoria_id">
                @if(isset($funcionario))
                    @foreach ($categorias as $categoria )
                        <option value="{{ $categoria->id }}" @if($categoria->id == $funcionario->categoria_id) selected @endif>{{ $categoria->categoria }}</option>
                    @endforeach
                @else
                @forelse ($categorias as $categoria )
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @empty
                @endforelse

                @endif
            </select>
        </div>

        <div class="form-group">
            <label>Email *</label>
            <input type="email" class="form-control" required name="email" value="{{ $funcionario->getUser->email ?? old ('telefone') }}">
        </div>
    </div>
</div>
