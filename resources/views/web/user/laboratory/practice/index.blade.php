@extends('web.user.laboratory.main')
@section('content-laboratory')

<h4 class="mb-4">Praktikum</h4>

<div class="row">
    <div class="col-lg-12">
        <!-- acadion -->
        <div class="accordion clearfix">
            @forelse ($practices as $practice)
            <!-- toggle -->
            <div class="toggle ttm-style-classic ttm-toggle-title-bgcolor-darkgrey ttm-control-right-true">
                <div class="toggle-title"><a href="#">{{$practice->title}}</a></div>
                <div class="toggle-content">
                    <p>{{$practice->desc}}</p>
                </div>
            </div><!-- toggle end -->
            @empty
            <x-display-error />
            @endforelse
        </div>
    </div>
</div>
@endsection