<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">


    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
     <!-- DataTables -->
     <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
     <link rel="stylesheet"
         href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css?v=3.2.0') }} ">

    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.css') }} ">
     <!-- Styles -->
     {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
<style>
     .bg-rosa {
            background-color: #560134;
            color: white;
        }
        .sidebar-dark-danger .nav-sidebar>.nav-item>.nav-link.active,
        .sidebar-light-danger .xnav-sidebar>.nav-item>.nav-link.active {
            background-color: #560134;
            color: #fff;
        }

        .btn-rosa{
            background-color: #560134;
            color: white;
        }

        .btn-rosa:hover{
            background-color: #3d0125;
            color: white;
        }

</style>
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.css') }}">

    {{-- @toastr_css --}}

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin-lte/dist/img/AdminLTELogo.png/') }} " alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-light bg-rosa">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars text-white"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link text-white">Home</a>
                </li>
            </ul>

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

            <a href="index3.html" class="brand-link">
                <img src="{{ asset('admin-lte/dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light" style="color:#560134">CMS</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin-lte/dist/img/user2-160x160.jpg') }} " class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="color:#560134">
                            {{ Auth::user()->name }}
                        </a>
                    </div>
                </div>

                {{-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> --}}

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>
                                    Categorias
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link active">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Gestion de categorias</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Productos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index') }}" class="nav-link active">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Gestion de productos</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Widgets
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li> --}}
                         
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            {{-- <div class="content-header"> --}}
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            
                            <div class="row mt-5">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; <?=date('Y') ?> CohetesIS</a>.</strong>
            Todos los derechos reservador
            <div class="float-right d-none d-sm-inline-block">
                
            </div>
        </footer>

    </div>

    {{-- @jquery
    @toastr_js
    @toastr_render --}}
    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script> --}}
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
    <script src="{{ asset('js/table.js') }}"></script>

    @yield('formulario')
</body>

</html>
