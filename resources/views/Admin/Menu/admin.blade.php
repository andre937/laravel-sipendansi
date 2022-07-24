
<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/web.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <!-- Custom Script -->
        <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({placeholder: "Choose"});
        });
        </script>
        <script>
        $(document).ready(function() {
            $('.nilai-edit').editable();
        });
        </script>
    <link rel="stylesheet" href="{{ asset('style/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!--<script src='https://cdn.tiny.cloud/1/kgnm9m3q3j5qoq6t2qunydspfzsnbd7csq5ie4idl16msqju/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>-->
  <link rel="stylesheet" href="{{ asset('summernote/summernote-bs4.css')}}">
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand text-light" href="{{ route('Admin.Dashboard')}}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a class="navbar-brand hidden" href="{{ route('Admin.Dashboard')}}"><img src="{{ asset('template/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('Admin.Dashboard')}}"> <i class="menu-icon fa fa-home"></i>Beranda </a>
                    </li>
                    @if(auth()->user()->role == 'Siswa')
                    @elseif(auth()->user()->role == 'Guru')
                    @else
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                    <li class="menu-item">
                            <a href="{{ route('Admin.Pengumuman.pengumuman')}}"> <i class="menu-icon fa fa-list-alt"></i>Pengumuman</a>
                        </li>
                    <li class="menu-item">
                        <a href="{{ route('Admin.Siswa.siswa')}}"> <i class="menu-icon fa fa-th-list"></i>Data Siswa</a>
                    </li>
                    @endif
                    @if(auth()->user()->role == 'Admin')
                        <li class="menu-item">
                            <a href="{{ route('Admin.Guru.guru')}}"> <i class="menu-icon fa fa-list-alt"></i>Data Guru</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('Admin.Kelas.kelas')}}"><i class="menu-icon fa fa-laptop"></i>Data Kelas</a>
                        </li>
                    @endif
                    @if(auth()->user()->role == 'Guru')
                        <li class="menu-item">
                            <a href="{{ route('Admin.Kelas.logprof')}}"> <i class="menu-icon fa fa-th-list"></i>Data Kelas</a>
                        </li>
                    @endif
                    @if(auth()->user()->role == 'Admin')
                        <li class="menu-item">
                        <a href="{{ route('Admin.User.guru-user')}}"><i class="menu-icon fa fa-user"></i>Data User</a>
                        </li>
                        <li class="menu-title">Kategori</li>
                        <li class="menu-item">
                            <a href="{{ route('Admin.Nilai.nilai')}}"><i class="menu-icon fa fa-book"></i>KD</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('Admin.Pelajaran.pelajaran')}}"><i class="menu-icon fa fa-book"></i>Pelajaran</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('Admin.Jabatan.jabatan')}}"><i class="menu-icon fa fa-book"></i>Jabatan</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('Admin.Ktkelas.ktkelas')}}"><i class="menu-icon fa fa-book"></i>Kelas</a>
                        </li>
                    @endif
                    <li class="menu-title">Pengaturan</li>
                    <li class="menu-item">
                        <a href="{{ route('logout') }}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> <i class="menu-icon fa fa-power-off"></i>Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right mt-2">
                         {{ Auth::user()->username }}
                    </div>
                </div>
            </div>
        </header>
    @yield('breadcrumbs')
    @yield('content')
    </div><!-- Right Panel -->
    <script src="{{ asset('style/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('style/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('style/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/main.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('style/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('style/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('style/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
    <script src="{{ asset('style/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/dashboard.js')}}"></script>
    <script src="{{ asset('style/assets/js/widgets.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#nisn').select2({
            placeholder: "Choose"
        });
         });
    </script>

</body>

</html>
