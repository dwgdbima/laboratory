@extends('web.user.laboratory.main')
@section('content-laboratory')
<h4 class="mb-4">Peralatan</h4>
<div class="row multi-columns-row ttm-boxes-spacing-15px">
    @forelse ($equipment as $item)
    <div class="ttm-box-col-wrapper col-lg-4 col-md-4 col-sm-6">
        <!-- featured-imagebox -->
        <div class="featured-imagebox featured-imagebox-portfolio ttm-portfolio-box-view2">
            <!-- ttm-box-view-overlay -->
            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                <!-- featured-thumbnail -->
                <div class="featured-thumbnail">
                    <a href="#"> <img class="img-fluid" src="{{asset($item->image)}}" alt="image"></a>
                </div><!-- featured-thumbnail end-->
                <div class="featured-iconbox ttm-media-link">
                    <a class="ttm_prettyphoto ttm_image" title="{{$item->name}}" data-rel="prettyPhoto"
                        href="{{asset($item->image)}}">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a href="{{route('laboratory.equipment.show', ['slug' => Route::current()->parameter('slug'), 'id' => $item->id])}}"
                        class="ttm_link"><i class="ti ti-link"></i></a>
                </div>
            </div><!-- ttm-box-view-overlay end-->
            <div class="ttm-box-view-content-inner">
                <div class="featured-content featured-content-portfolio">
                    <div class="featured-title">
                        <h5><a
                                href="{{route('laboratory.equipment.show', ['slug' => Route::current()->parameter('slug'), 'id' => $item->id])}}">{{$item->name}}</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div><!-- featured-imagebox -->
    </div>
    @empty
    <x-display-error />
    @endforelse
</div>
@endsection