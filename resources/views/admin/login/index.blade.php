<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sgtarefa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('dist/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>SGtarefa</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Faça login para iniciar sua sessão</p>

        <div class="input-group mb-3">
          <input type="email" id="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" onclick="iniciar_sessao()">Login</button>
          </div>
        </div>

    </div>
  </div>
</div>
<!-- jQuery -->
<script src="{{ url('dist/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('dist/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js')}}"></script>
<script>
    function iniciar_sessao(){
        var email = $("#email").val();
        var password = $("#password").val();
        $.post("{{ route('login2') }}",{'_token': '{{ csrf_token() }}',email:email,password:password},function(dados){
           if(dados == "success"){
            window.location.href="{{route('login1')}}";
           }else{
               alert("Erro ao iniciar sessao")
           }
        })
    }
</script>
</body>
</html>
