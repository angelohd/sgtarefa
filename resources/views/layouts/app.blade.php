<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Kanban Board</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('dist/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ url('dist/plugins/ekko-lightbox/ekko-lightbox.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SGTarefa 1.0</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->getFuncionario->nome }}</a>
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
              <li class="nav-item">
                <a href="../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Minhas tarefas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tarefas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sgtarefa_funcionarios') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Funcionario</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>@yield('titulo')</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3">
      <div class="container-fluid h-100">
       @yield('conteudo')

        {{-- <div class="card card-row card-secondary">
          <div class="card-header">
            <h3 class="card-title">
              Backlog
            </h3>
          </div>
          <div class="card-body">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">Create Labels</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#3</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                  <label for="customCheckbox1" class="custom-control-label">Bug</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox2" disabled>
                  <label for="customCheckbox2" class="custom-control-label">Feature</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox3" disabled>
                  <label for="customCheckbox3" class="custom-control-label">Enhancement</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox4" disabled>
                  <label for="customCheckbox4" class="custom-control-label">Documentation</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox5" disabled>
                  <label for="customCheckbox5" class="custom-control-label">Examples</label>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Create Issue template</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#4</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1_1" disabled>
                  <label for="customCheckbox1_1" class="custom-control-label">Bug Report</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1_2" disabled>
                  <label for="customCheckbox1_2" class="custom-control-label">Feature Request</label>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Create PR template</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#6</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card card-light card-outline">
              <div class="card-header">
                <h5 class="card-title">Create Actions</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#7</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>

              </div>
              <div class="card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                  Aenean commodo ligula eget dolor. Aenean massa.
                  Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-row card-primary">
          <div class="card-header">
            <h3 class="card-title">
              To Do
            </h3>
          </div>
          <div class="card-body">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Create first milestone</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#5</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-row card-default">
          <div class="card-header bg-info">
            <h3 class="card-title">
              In Progress
            </h3>
          </div>
          <div class="card-body">
            <div class="card card-light card-outline">
              <div class="card-header">
                <h5 class="card-title">Update Readme</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#2</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                  Aenean commodo ligula eget dolor. Aenean massa.
                  Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-row card-success">
          <div class="card-header">
            <h3 class="card-title">
              Done
            </h3>
          </div>
          <div class="card-body">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Create repo</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#1</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-row card-primary">
            <div class="card-header">
              <h3 class="card-title">
                To Do
              </h3>
            </div>
            <div class="card-body">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title">Create first milestone</h5>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-link">#5</a>
                    <a href="#" class="btn btn-tool">
                      <i class="fas fa-pen"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="card card-row card-default">
            <div class="card-header bg-info">
              <h3 class="card-title">
                In Progress
              </h3>
            </div>
            <div class="card-body">
              <div class="card card-light card-outline">
                <div class="card-header">
                  <h5 class="card-title">Update Readme</h5>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-link">#2</a>
                    <a href="#" class="btn btn-tool">
                      <i class="fas fa-pen"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                    Aenean commodo ligula eget dolor. Aenean massa.
                    Cum sociis natoque penatibus et magnis dis parturient montes,
                    nascetur ridiculus mus.
                  </p>
                </div>
              </div>
            </div>
        </div>

        <div class="card card-row card-success">
            <div class="card-header">
              <h3 class="card-title">
                Done
              </h3>
            </div>
            <div class="card-body">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title">Create repo</h5>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-link">#1</a>
                    <a href="#" class="btn btn-tool">
                      <i class="fas fa-pen"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
        </div> --}}

      </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2022 <a href="#">sgtarefa</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('dist/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ url('dist/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ekko Lightbox -->
<script src="{{ url('dist/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js')}}"></script>
<!-- Filterizr-->
<script src="{{ url('dist/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {

  })
</script>
</body>
</html>
