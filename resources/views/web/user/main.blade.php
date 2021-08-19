<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('web.user.layout.header')

    @include('web.user.layout.resources.css')

</head>


<body>

    <!--page start-->
    <div class="page">


        <!-- preloader start -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- preloader end -->


        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">
            @include('web.user.layout.navbar')
        </header>
        <!--header end-->

        @yield('content')

        <!--footer start-->
        <footer class="footer widget-footer clearfix">
            @include('web.user.layout.footer')
        </footer>
        <!--footer end-->

        <!--back-to-top start-->
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->

    </div><!-- page end -->


    <!-- Javascript -->

    @include('web.user.layout.resources.js')

</body>

</html>