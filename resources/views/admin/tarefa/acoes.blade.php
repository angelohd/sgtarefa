@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function iniciar_tarefa(id){

        $.post("{{ route('tarefa.iniciar_tarefa') }}",{'_token': '{{ csrf_token() }}',id:id},function(dados){
           if(dados == "success"){

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Taraefa inicializada',
                    showConfirmButton: false,
                    timer: 2000
                })
                location. reload();
           }
        })
    }

    function concluir_tarefa(id){

        $.post("{{ route('tarefa.concluir_tarefa') }}",{'_token': '{{ csrf_token() }}',id:id},function(dados){
            if(dados == "success"){

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Taraefa Concluida',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    location. reload();
            }
        })
    }

    function aprovar_tarefa(id){

        $.post("{{ route('tarefa.aprovar_tarefa') }}",{'_token': '{{ csrf_token() }}',id:id},function(dados){
            if(dados == "success"){

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Taraefa Aprovada',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    location. reload();
            }
        })
    }

    function reprovar_tarefa(id){

        $.post("{{ route('tarefa.reprovar_tarefa') }}",{'_token': '{{ csrf_token() }}',id:id},function(dados){
            if(dados == "success"){

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Taraefa Reprovada',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    location. reload();
            }
        })
    }
</script>

@endsection
