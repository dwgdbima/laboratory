@extends('web.user.main')
@push('styles')

@endpush
@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row d-flex flex-row align-items-center justify-content-between">
                <div class="page-title-heading">
                    <h2 class="title">Profil</h2>
                </div>
                <div class="breadcrumb-wrapper">
                    <span>
                        <a title="Homepage" href="{{'/'}}">Beranda</a>
                    </span>
                    <span>Profil</span>
                </div>
            </div>
        </div>
    </div>
</div><!-- page-title end-->


<!--site-main start-->
<div class="site-main">

    <!--introduction-section-->
    <section class="ttm-row introduction-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="pt-30">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h2 class="title">Kata Pengantar</h2>
                            </div>
                            <div class="title-desc">
                                {!!$about->desc!!}
                            </div>
                        </div><!-- section title end -->
                        <div class="section-title">
                            <div class="title-header">
                                <h2 class="title">Visi dan Misi</h2>
                            </div>
                        </div><!-- section title end -->
                        <div class="featured-icon-box icon-align-before-content icon-ver_align-top pt-5 mb-25">
                            <div class="featured-icon">
                                <div
                                    class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                    <i class="flaticon-pigment"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>Visi Kami</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>{{$about->vision}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="featured-icon-box icon-align-before-content icon-ver_align-top pt-10">
                            <div class="featured-icon">
                                <div
                                    class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                    <i class="flaticon-lab-1"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>Misi Kami</h5>
                                </div>
                                <div class="featured-desc">
                                    <div class="d-flex">
                                        <ul
                                            class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor pt-15 pr-15">
                                            @foreach ($about->mission as $mission)
                                            <li>
                                                <i class="fa fa-arrow-circle-right"></i>
                                                <div class="ttm-list-li-content">
                                                    {{$mission['value']}}
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </section>
    <!--introduction-section end-->

    <section
        class="ttm-row services-section-2 bg-layer-equal-height ttm-bgcolor-grey bg-img5 ttm-bg ttm-bgimage-yes clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-9 m-auto">
                    <!-- section-title -->
                    <div class="section-title with-sep title-style-center_text">
                        <div class="title-header">
                            <h2 class="title">Ketua Laboratorium</h2>
                        </div>
                    </div><!-- section-title end -->
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-xl-6 col-lg-6">
                    <div
                        class="ttm-bgcolor-white pl-50 pt-50 pb-50 pr-50 res-991-pl-15 res-991-pr-15 res-991-pt-30 res-991-pb-40">
                        <div class="ttm-team-member-content shadow-box">
                            <div class="ttm-team-member-single-list">
                                <h2 class="ttm-team-member-single-title">{{$chairman->name}}</h2>
                                <p>{{$chairman->title}}</p>
                                <div class="ttm-team-details-wrapper">
                                    <div class="sep_holder_box width-100 mt-20 mb-30">
                                        <span class="sep_holder"><span class="sep_line"></span></span>
                                    </div>
                                    <h2 class="ttm-team-member-single-title">Sambutan</h2>
                                    <p>{!! $chairman->greeting !!}</p>
                                </div>
                                <div class="sep_holder_box width-100 mt-20 mb-35">
                                    <span class="sep_holder"><span class="sep_line"></span></span>
                                </div>
                                <div class="ttm-social-links-wrapper">
                                    <ul class="social-icons">
                                        @foreach ($chairman->social_media as $social_media)
                                        <li class="social-{{$social_media['name']}}">
                                            <a class="tooltip-top" target="_blank" href="{{$social_media['url']}}"
                                                data-tooltip="{{Str::title($social_media['name'])}}"><i
                                                    class="{{$social_media['icon']}}" aria-hidden="true"></i></a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="ttm-bgcolor-skincolor pt-15 pl-50 pb-10 mb-50 res-991-pl-15">
                        <h4 class="mb-5">Email: {{$chairman->email}}</h4>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="ttm-bgcolor-white">
                        <div class="row">
                            <div class="col-lg-8">
                                <!-- ttm_single_image-wrapper -->
                                <div
                                    class="ttm_single_image-wrapper mt-50 mb_50 mr_150 res-991-mr-15 res-991-mt-0 z-index-2 position-relative">
                                    <img class="img-fluid" src="{{asset($chairman->photo)}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-skincolor pt-50 pr-50 mb-50 ml_150">
                                    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                    <div class="layer-content">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<!--site-main end-->
@endsection

@push('scripts')

@endpush