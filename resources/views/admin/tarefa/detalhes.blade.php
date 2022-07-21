<div class="form-group">
    <label>Descricao:</label>
    <h4>{{ $tarefa->descricao }}</h4>
</div>
<hr>
<div class="form-group">
    <div class="row">

        <div class="col-sm-3">

            <div class="form-group">
                <label>Data da publicacao:</label>
                <p>{{ $tarefa->created_at }}</p>
            </div>

            <div class="form-group">
                <label>Prioridade:</label>
                <p>{{ $tarefa->prioridade }}</p>
            </div>

        </div>

        <div class="col-sm-2">

            <div class="form-group">
                <label>Data inicio:</label>
                <p>{{ $tarefa->data_inicio }}</p>
            </div>
            <div class="form-group">
                <label>Data fim:</label>
                <p>{{ $tarefa->data_fim }}</p>
            </div>

        </div>

        <div class="col-sm-2">

            <div class="form-group">
                <label>Hora inicio:</label>
                <p>{{ $tarefa->hora_inicio }}</p>
            </div>
            <div class="form-group">
                <label>Hora fim:</label>
                <p>{{ $tarefa->hora_fim }}</p>
            </div>

        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="">Publicado por:</label>
               <h4 style="color: green"> {{ $tarefa->getUser->getFuncionario->nome }}</h4>
            </div>
        </div>
    </div>

</div>
<hr>
<div class="form-grupo">
    <h2>Tempo Restante: <label id="dia"></label> <label id="hora"></label> <label id="minuto"></label> <label id="segundo"></label></h2>
    <label for="" id="demo"></label>

</div>

@section('js')
<script>
   function tempo(data_inicio,hora_inicio,data_fim,hora_fin){
    const datainicial = data_inicio+" "+hora_inicio
    const datafinal = data_fim+" "+hora_fin

    var deadline = new Date(datainicial).getTime();
    var x = setInterval(function() {

        var now =  new Date(datafinal).getTime();
        var t = deadline - now;
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
        var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((t % (1000 * 60)) / 1000);
        document.getElementById("dia").innerHTML =days ;
        document.getElementById("hora").innerHTML =hours;
        document.getElementById("minuto").innerHTML = minutes;
        document.getElementById("segundo").innerHTML =seconds;
        if (t < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "TIME UP";
                document.getElementById("dia").innerHTML ='0';
                document.getElementById("hora").innerHTML ='0';
                document.getElementById("minuto").innerHTML ='0' ;
                document.getElementById("segundo").innerHTML = '0'; }
        }, 1000);
    // alert(datainicial)
   }
</script>
@endsection
