@extends('web.user.laboratory.main')
@section('content-laboratory')
<h4 class="mb-4 text-center">{{$equipment->name}}</h4>
<img src="{{asset($equipment->image)}}" class="img-fluid m-auto d-block" style="max-height: 470px;" alt="">
<p class="mt-4">
    {{$equipment->desc}}
</p>
@endsection