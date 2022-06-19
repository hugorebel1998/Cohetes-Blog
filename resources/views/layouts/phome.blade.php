<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @section('title', 'Beo World')
    <title> @yield('title') | Administrador </title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.css') }}">
    <!-- DateRange -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.css') }} ">

    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">


    <style>
        .bg-azul {
            background-color: #010E65;
            color: white;
        }

        .sidebar-dark-danger .nav-sidebar>.nav-item>.nav-link.active,
        .sidebar-light-danger .xnav-sidebar>.nav-item>.nav-link.active {
            background-color: #010E65;
            color: #fff;
        }

        .text-azul {
            color: #010E65 !important;
        }

        .btn-azul {
            background-color: #010E65;
            color: white;
        }

        .btn-azul:hover {
            background-color: #020d55;
            color: white;
        }
    </style>
    {{-- @toastr_css --}}
</head>

<body class="hold-transition sidebar-collapsed">
    <div class="wrapper">


        <nav class="main-header navbar navbar-expand navbar-dark bg-azul">

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{ route('home.admin') }}" class="nav-link text-white"><i class="fas fa-home"></i>
                        Inicio</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" data-toggle="dropdown" href="#">
                        <span class="mr-2"><b>|</b></span>
                        <span class="mr-2"><b>Perfil</b></span>
                        <i class="fas fa-user-shield"></i>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <p class="text-center mt-3">
                            <b>{{ auth()->user()->name }}</b>
                        </p>
                        <span class="dropdown-header">{{ auth()->user()->email }}</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesión') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-danger navbar-light elevation-4">
            <a href="#" class="brand-link navbar-white pl-3">
                <img class="mx-auto d-block" src="{{ asset('img/beo.png') }}" alt="Beo Worl" width="170">

            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                        <img src="{{ asset('img/user.png') }}" class="img-circle elevation-4"
                            style="opacity: .9; height:50px; width:50px">
                    </div>
                    <div class="info mt-2">
                        <a href="#" class="text-azul"> {{ auth()->user()->name }} </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>
                                    Gestion de pagos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-secondary">
                                        <i class="fab fa-cc-paypal nav-icon"></i>
                                        <p class="text-black">Pagos por PayPal</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-secondary">
                                        <i class="fab fa-cc-stripe nav-icon"></i>
                                        <p class="text-black">Pagos por Stripe</p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-globe"></i>
                                <p>
                                    Gestion de paises
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-secondary">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p class="text-black">Lista de paises</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>


        <div class="content-wrapper portada">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <!-- <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Laboratorio</h1>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li> -->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar sidebar-dark-info navbar-danger elevation-2">
            <div class="p-3">
                <h5 class="text-center text-white"><i class="nav-icon fas fa-users"></i> Usuarios</h5>
                <a href="{{ route('usuarios.index') }}" class="nav-link active text-white"><i
                        class="fas fa-user-friends"></i> Lista de usuarios</a>
                <a href="{{ route('usuarios.create') }}" class="nav-link active text-white"><i
                        class="fas fa-user-friends"></i> Crear usuario</a>
                <a href="{{ route('usuarios.indexdelete') }}" class="nav-link active text-white"><i
                        class="fas fa-user-times"></i> Usuarios
                    eliminados</a>
            </div>
        </aside> --}}

        <footer class="main-footer">

            <div class="text-center">
                <p>&copy; <?= date('Y') ?> <strong>Beo World</strong> .</p>
            </div>
        </footer>
    </div>

    {{-- @jquery
    @toastr_js
    @toastr_render --}}
    <!-- jQuery -->
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <!--MomenJS -->
    <script src="{{ asset('admin-lte/plugins/moment/moment.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- DateRange -->
    <script src="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }} "></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    <!-- TableJS -->
    <script src="{{ asset('js/table.js') }}"></script>
    
</body>

</html>
