<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('web.admin.layout.header')

    @include('web.admin.layout.resources.css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('web.admin.layout.navbar')
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('web.admin.layout.sidebar')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{end($menuData)['title']}}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @if (end($menuData)['title'] != 'Dashboard')
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Dashboard</a>
                                </li>
                                @endif
                                @foreach ($menuData as $menu)
                                <li class="breadcrumb-item {{$loop->last ? 'active' : ''}}">
                                    @if (!$loop->last)
                                    <a href="{{$menu['route']}}">{{$menu['title']}}</a>
                                    @else
                                    {{$menu['title']}}
                                    @endif
                                </li>
                                @endforeach
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Notification</h5>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            @include('web.admin.layout.footer')
        </footer>
    </div>

    <div class="overlay-loading-screen"></div>
    <div class="spanner-loading-screen">
        <div class="loading-screen"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('sweetalert::alert')
    @include('web.admin.layout.resources.js')

</body>

</html>