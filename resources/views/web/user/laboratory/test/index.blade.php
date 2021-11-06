@extends('web.user.laboratory.main')
@section('content-laboratory')

<h4 class="mb-4">Pengujian</h4>

<div class="row">
    <div class="col-lg-12">
        <!-- acadion -->
        <div class="accordion clearfix">
            @forelse ($tests as $test)
            <!-- toggle -->
            <div class="toggle ttm-style-classic ttm-toggle-title-bgcolor-darkgrey ttm-control-right-true">
                <div class="toggle-title"><a href="#">{{$test->title}}</a></div>
                <div class="toggle-content">
                    @isset($test->desc)
                    <p>{!!$test->desc!!}</p>
                    @else
                    <p>Tidak ada deskripsi</p>
                    @endisset
                </div>
            </div><!-- toggle end -->
            @empty
            <x-display-error />
            @endforelse
        </div>
    </div>
</div>
@endsection