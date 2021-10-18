<div class="first-footer ttm-bgcolor-skincolor">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 widget-area">
                <div class="featured-icon-box icon-align-before-content style1">
                    <div class="featured-icon">
                        <div
                            class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                            <i class="flaticon-mail"></i>
                        </div>
                    </div>

                    <div class="featured-content">
                        <div class="featured-title">
                            <h5>Subscribe To Our Newsletter</h5>
                        </div>
                        <div class="featured-desc">
                            <p>Stay in touch with us to get latest news and discount coupons</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 widget-area">
                <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                    <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                        <p><input type="email" name="email" placeholder="Enter Your Email Address..." required=""></p>
                        <p><button
                                class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-dark"
                                type="submit">Subscribe Now!</button></p>
                    </div>
                    <div id="subscribe-msg"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="second-footer">
    <div class="container">
        <div class="row">
            <div class="widget-area col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <aside class="widget widget-text">
                    <!--featured-icon-box-->
                    <div class="featured-icon-box icon-align-before-content">
                        <div class="featured-icon">
                            <div
                                class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                <i class="flaticon-placeholder"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Alamat</h5>
                            </div>
                            <div class="featured-desc">
                                <p>{{$contact->address}}</p>
                            </div>
                        </div>
                    </div><!-- featured-icon-box end-->
                </aside>
            </div>
            <div class="widget-area col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <aside class="widget widget-text">
                    <!--featured-icon-box-->
                    <div class="featured-icon-box icon-align-before-content">
                        <div class="featured-icon">
                            <div
                                class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Hubungi Kami</h5>
                            </div>
                            <div class="featured-desc">
                                <p>{{$contact->phone}}</p>
                            </div>
                        </div>
                    </div><!-- featured-icon-box end-->
                </aside>
            </div>
            <div class="widget-area col-xs-12 col-sm-12 col-md-3 col-lg-4">
                <aside class="widget widget-text">
                    <!--featured-icon-box-->
                    <div class="featured-icon-box icon-align-before-content">
                        <div class="featured-icon">
                            <div
                                class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                <i class="flaticon-email"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Email</h5>
                            </div>
                            <div class="featured-desc">
                                <p><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></p>
                            </div>
                        </div>
                    </div><!-- featured-icon-box end-->
                </aside>
            </div>
        </div>
    </div>
</div>
<div class="third-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 widget-area">
                <div class="widget widget_text clearfix">
                    <h3 class="widget-title">Profil</h3>
                    <div class="textwidget widget-text">
                        <p class="pb-10 pr-30">{{Str::limit(strip_tags($about->desc), 200)}}</p>
                        <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-dark"
                            href="{{route('about')}}" title="">Read More!</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                <div class="widget widget_nav_menu clearfix">
                    <h3 class="widget-title">Daftar Laboratorium</h3>
                    <ul id="menu-footer-quick-links">
                        <li><a href="#">About Company</a></li>
                        <li><a href="#">Scientific</a></li>
                        <li><a href="#">Customer Insights</a></li>
                        <li><a href="#">Chemistry</a></li>
                        <li><a href="#">Free Consultation</a></li>
                        <li><a href="#">Gemological</a></li>
                        <li><a href="#">Meet Our Team</a></li>
                        <li><a href="#">Forensic science</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                <div class="widget style2 widget-out-link clearfix">
                    <h3 class="widget-title">Berita Terkini</h3>
                    <ul class="widget-post ttm-recent-post-list pr-5">
                        <li>
                            <a href="blog-single.html"><img src="https://via.placeholder.com/100x95.jpg"
                                    alt="post-img"></a>
                            <span class="post-date"><i class="fa fa-calendar"></i>Oct 06, 2019</span>
                            <a href="blog-single.html">Tests with Nursing Implicat Laboratory Technician</a>
                        </li>
                        <li>
                            <a href="blog-single.html"><img src="https://via.placeholder.com/100x95.jpg"
                                    alt="post-img"></a>
                            <span class="post-date"><i class="fa fa-calendar"></i>Oct 24, 2019</span>
                            <a href="blog-single.html">Tests with Nursing Implicat Laboratory Technician</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bottom-footer-text">
    <div class="container">
        <div class="row copyright">
            <div class="col-sm-9">
                <span>Copyright © 2021 Laboratorium Theme by <a href="https://deveureka.com/">Deveureka</a></span>
            </div>
            <div class="col-sm-3">
                <div class="d-flex flex-row align-items-center justify-content-end social-icons">
                    <ul class="social-icons list-inline">
                        @foreach ($contact->social_media as $social_media)
                        <li class="social-{{$social_media['name']}}">
                            <a class="tooltip-top" target="_blank" href="{{$social_media['url']}}"
                                data-tooltip="{{Str::title($social_media['name'])}}">
                                <i class="{{$social_media['icon']}}"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>