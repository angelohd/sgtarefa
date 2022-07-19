<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SgTerefa</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ url('dist/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ url('dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ url('dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ url('dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css')}}">
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <form action="{{ route('utilizador.logout') }}" method="POST">
            @csrf
            <button class="nav-link">Terminar sessao</button>
        </form>
      </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">SGTarefa 1.0</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->getFuncionario->nome }}</a>
          <label for="" class="text-success">Online</label>
          <label for="" class="text-primary"> // {{ Auth::user()->getFuncionario->getCategoria->categoria }}> //</label>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Geral
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('kanban')


              <li class="nav-item">
                <a href="../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Minhas tarefas</p>
                </a>
              </li>
              @endcan
              @can('listtarefa')

              <li class="nav-item">
                <a href="../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tarefas</p>
                </a>
              </li>
              @endcan
              @can('listfuncionario')

              <li class="nav-item">
                <a href="{{ route('funcionarios.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Funcionario</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1>@yield('titulo')</h1>
            </div>
          </div>
        </div>
      </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @yield('conteudo')
          </div>
        </div>
      </div>
    </section>
  </div>

   <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2022 <a href="#">sgtarefa</a>.</strong> All rights reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="{{ url('dist/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ url('dist/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ url('dist/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ url('dist/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ url('dist/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('dist/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ url('dist/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ url('dist/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ url('dist/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ url('dist/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ url('dist/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ url('dist/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{ url('dist/js/adminlte.min.js')}}"></script>
<script src="{{ url('dist/js/demo.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@yield('js')
</body>
</html>
