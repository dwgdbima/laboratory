<div class="col-lg-4 widget-area sidebar-right">
    <aside class="widget widget-nav-menu">
        <ul class="widget-menu">
            <li
                class="{{request()->routeIs('laboratory.equipment') || request()->routeIs('laboratory.equipment.*') ? 'active' : ''}}">
                <a href="{{route('laboratory.equipment', ['slug' => request()->slug])}}">Peralatan</a>
            </li>
            <li class="{{request()->routeIs('laboratory.test') ? 'active' : ''}}"><a
                    href="{{route('laboratory.test', ['slug' => request()->slug])}}">Pengujian</a></li>
            <li class="{{request()->routeIs('laboratory.practice') ? 'active' : ''}}"><a
                    href="{{route('laboratory.practice', ['slug' => request()->slug])}}">Praktikum</a></li>
            <li class="{{request()->routeIs('laboratory.blog') ? 'active' : ''}}"><a
                    href="{{route('laboratory.blog', ['slug' => request()->slug])}}">Berita</a></li>
        </ul>
    </aside>
    {{-- <aside class="widget widget-download">
        <ul class="download">
            <li><i class="fa fa-file-pdf-o"></i>
                <div>
                    <h4>Our Brouchers</h4><a href="#">Download</a>
                </div>
            </li>
            <li><i class="fa fa-file-pdf-o"></i>
                <div>
                    <h4>Laboratory Details</h4><a href="#">Download</a>
                </div>
            </li>
        </ul>
    </aside> --}}
    <aside class="widget widget-contact p-0">
        <div
            class="ttm-col-bgcolor-yes ttm-bgcolor-darkgrey col-bg-img-one ttm-col-bgimage-yes ttm-bg pt-20 pl-20 pr-20 pb-20">
            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                <div class="ttm-col-wrapper-bg-layer-inner"></div>
            </div>
            <div class="layer-content">
                <div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-grey pt-1 pb-1 pl-1 pr-1">
                    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>

                    <div class="ttm-col-bgcolor-yes ttm-bgcolor-darkgrey ttm-bg pt-50 pl-30 pr-30 pb-40">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                            <div class="ttm-col-wrapper-bg-layer-inner"></div>
                        </div>
                        <div class="layer-content">
                            <div
                                class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-lg mb-15">
                                <i class="flaticon-pigment"></i>
                            </div>
                            <h4>Bagaimana Kami Membantu?</h4>
                            <p>Jika Anda membutuhkan bantuan, jangan ragu untuk menghubungi kami.</p>
                            <ul class="ttm-textcolor-white">
                                <li><i class="flaticon-call mr-2"></i>{{$laboratory->phone}}</li>
                                <li><i class="flaticon-email mr-2"></i><a
                                        href="mailto:info@laboratory.com">{{$laboratory->user->email}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>