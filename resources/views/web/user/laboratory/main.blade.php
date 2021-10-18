@extends('web.user.main')
@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row d-flex flex-row align-items-center justify-content-between">
                <div class="page-title-heading">
                    <h2 class="title">{{$laboratory->name}}</h2>
                </div>
            </div>
        </div>
    </div>
</div><!-- page-title end-->


<!--site-main start-->
<div class="site-main">

    <div class="ttm-row sidebar ttm-sidebar-right clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                @include('web.user.laboratory.layout.sidebar')
                <div class="col-lg-8 content-area">
                    <div class="ttm-service-single-content-area">
                        @yield('content-laboratory')
                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </div>


</div>
<!--site-main end-->
@endsection