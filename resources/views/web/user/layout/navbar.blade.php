<!-- top_bar -->
<div class="top_bar ttm-bgcolor-darkgrey clearfix">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 d-flex flex-row align-items-center">
                <div class="top_bar_contact_item">
                    <div class="top_bar_icon"><i class="fa fa-phone"></i></div>{{$contact->phone}}
                </div>
                <div class="top_bar_contact_item">
                    <div class="top_bar_icon"><i class="fa fa-envelope-o"></i></div><a
                        href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                </div>
                <div class="top_bar_contact_item ml-auto">
                    <div class="top_bar_social">
                        <ul class="social-icons">
                            @foreach ($contact->social_media as $social_media)
                            <li>
                                <a class="tooltip-bottom" target="_blank" href="zzzzzz"
                                    data-tooltip="{{$social_media['name']}}" tabindex="-1"><i
                                        class="{{$social_media['icon']}}"></i>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- top_bar end-->
<!-- site-header-menu -->
<div id="site-header-menu" class="site-header-menu ttm-bgcolor-white">
    <div class="site-header-menu-inner ttm-stickable-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!--site-navigation -->
                    <div class="site-navigation d-flex flex-row">
                        <!-- site-branding -->
                        <div class="site-branding mr-auto">
                            <a class="home-link" href="{{'/'}}" title="Labostica" rel="home">
                                <img id="logo-img" class="img-center" style="width: 70px;"
                                    src="{{asset('dist/user/images/logo.png')}}" alt="logo-img">
                                <h5>
                                    LABORATORIUM <br>
                                    JURUSAN TEKNIK PERTAMBANGAN
                                </h5>
                            </a>
                        </div><!-- site-branding end -->
                        <div class="btn-show-menu-mobile menubar menubar--squeeze">
                            <span class="menubar-box">
                                <span class="menubar-inner"></span>
                            </span>
                        </div>
                        <!-- menu -->
                        <nav class="main-menu menu-mobile" id="menu">
                            <ul class="menu">
                                <li class="mega-menu-item {{request()->routeIs('home') ? 'active' : ''}}">
                                    <a href="{{'/'}}" class="mega-menu-link">Beranda</a>
                                </li>
                                <li class="mega-menu-item {{request()->routeIs('about') ? 'active' : ''}}">
                                    <a href="{{route('about')}}" class="mega-menu-link">Profil</a>
                                </li>
                                <li
                                    class="mega-menu-item megamenu-fw {{request()->routeIs('laboratory.*') ? 'active' : ''}}">
                                    <a href="#" class="mega-menu-link">Laboratorium</a>
                                    <ul class="mega-submenu megamenu-content" role="menu">
                                        <li>
                                            <div class="row">
                                                @foreach ($laboratories as $laboratory)
                                                <div class="col-menu col-md-4">
                                                    <div class="content">
                                                        <ul class="menu-col">
                                                            @foreach ($laboratory as $lab)
                                                            <li
                                                                class="{{request()->slug == $lab->slug ? 'active' : ''}}">
                                                                <a
                                                                    href="{{route('laboratory.equipment', $lab->slug)}}">{{$lab->name}}</a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div><!-- end col-3 -->
                                                @endforeach
                                            </div><!-- end row -->
                                        </li>
                                    </ul>
                                </li>
                                <li class="mega-menu-item {{request()->routeIs('blog') ? 'active' : ''}}">
                                    <a href="{{route('blog')}}" class="mega-menu-link">Berita</a>
                                </li>
                                <li class="mega-menu-item {{request()->routeIs('contact') ? 'active' : ''}}">
                                    <a href="{{route('contact')}}" class="mega-menu-link">Kontak</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="header_extra d-flex flex-row align-items-center justify-content-end">
                            <div class="header_btn">
                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-left ttm-btn-color-grey"
                                    href="#"> <i class="fa fa-calendar"></i>Appointment</a>
                                <div id="appointment">
                                    <h3>Keep in touch!</h3>
                                    <form class="wrap-form appointment_form clearfix" method="post" action="#">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-group">
                                                    <span class="text-input">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        <input name="name" type="text" value="" placeholder="Your Name"
                                                            required="required">
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-group">
                                                    <span class="text-input">
                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                        <input name="phone" type="tel" value=""
                                                            placeholder="Phone Number" required="required">
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-group">
                                                    <span class="text-input">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        <input name="email" type="email" value="" placeholder="Email">
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group date">
                                                    <span class="text-input">
                                                        <i class="fa fa-calendar"></i>
                                                        <input type="text" value="" id="datetimepicker1">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-group">
                                                    <span class="text-input">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        <input name="Note" type="text" value="" placeholder="Note">
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <button
                                                    class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-dark"
                                                    type="submit">Book appointment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="header_search">
                                <a href="#" class="btn-default search_btn"><i class="ti ti-search"></i></a>
                                <div class="header_search_content">
                                    <form id="searchbox" method="get" action="#">
                                        <input class="search_query" type="text" id="search_query_top" name="s"
                                            placeholder="Enter Keyword" value="">
                                        <button type="submit" class="btn close-search"><i
                                                class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- site-navigation end-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- site-header-menu end-->