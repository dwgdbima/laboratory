@extends('web.user.main')
@push('styles')

@endpush
@section('content')
<!--site-main start-->
<div class="site-main">
    <!--google_map-->
    <div id="google_map" class="google_map">
        <div class="map_container">
            {!!$contact->map!!}
        </div>
    </div>

    <!-- cta-info-section -->
    <section class="ttm-row cta-info-section ttm-bgcolor-grey bg-layer bg-layer-equal-height clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-4 col-md-8 col-sm-8">
                    <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-darkgrey z-index-2 spacing-5">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                        <div class="layer-content">
                            <div class="pb-15">
                                <h4>Informasi Kontak</h4>
                            </div>
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                <div class="featured-icon">
                                    <div
                                        class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-sm">
                                        <i class="flaticon-placeholder"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-desc">
                                        <p>{{$contact->address}}</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                            <div class="sep_holder_box width-100 mt-20 mb-20">
                                <span class="sep_holder"><span class="sep_line"></span></span>
                            </div>
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                <div class="featured-icon">
                                    <div
                                        class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-sm">
                                        <i class="flaticon-call"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-desc">
                                        <p>{{$contact->phone}}</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                            <div class="sep_holder_box width-100 mt-20 mb-20">
                                <span class="sep_holder"><span class="sep_line"></span></span>
                            </div>
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                <div class="featured-icon">
                                    <div
                                        class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-sm">
                                        <i class="flaticon-email"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-desc">
                                        <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                            <ul class="social-icons circle social-hover mt-30">
                                @foreach ($contact->social_media as $social_media)
                                <li class="social-{{$social_media['name']}}"><a class="tooltip-top" target="_blank"
                                        href="{{$social_media['url']}}" data-tooltip="{{$social_media['name']}}"><i
                                            class="{{$social_media['icon']}}" aria-hidden="true"></i></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-grey z-index-1">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                        <div class="layer-content">
                            <!-- testimonial-box -->
                            <div class="pt-45 pl-50 pb-50 pr-50 res-991-pl-15 res-991-pr-15 res-991-pt-30">
                                <!-- section-title -->
                                <div class="section-title">
                                    <div class="title-header">
                                        {{-- <h5>HUBUNGI KAMI</h5> --}}
                                        <h2 class="title">Hubungi Kami</h2>
                                    </div>
                                </div><!-- section-title end -->
                                <form id="ttm-contactform-2" class="ttm-contactform-2 wrap-form clearfix" method="post"
                                    action="#">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="name" type="text" value=""
                                                        placeholder="Nama" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="address" type="text" value=""
                                                        placeholder="Email" required="required"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="phone" type="text" value=""
                                                        placeholder="No. Telepon" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="phone" type="text" value=""
                                                        placeholder="Subjek" required="required"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label>
                                        <span class="text-input"><textarea name="message" rows="3" placeholder="Pesan"
                                                required="required"></textarea></span>
                                    </label>
                                    <button
                                        class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-dark"
                                        type="submit">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-info-section end -->

</div>
<!--site-main end-->
@endsection

@push('scripts')
<script src="{{asset('dist/user/js/map.js')}}"></script>
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
@endpush