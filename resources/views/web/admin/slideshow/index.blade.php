@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.slide-show.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <label for="slide_1">Slide 1</label>
                    <img src="{{asset($slideshow->slide_1)}}" class="img-fluid mb-3" id="d-slide_1" alt="">
                    <x-forms.input-file id="slide_1" name="slide_1" />
                </div>
                <div class="col-md-6">
                    <label for="slide_2">Slide 2</label>
                    <img src="{{asset($slideshow->slide_2)}}" class="img-fluid mb-3" id="d-slide_2" alt="">
                    <x-forms.input-file id="slide_2" name="slide_2" />
                </div>
                <button type="submit" class="btn btn-block btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $("#slide_1").change(function(){ 
        showUpload(this, '#d-slide_1');
    });
    $("#slide_2").change(function(){ 
        showUpload(this, '#d-slide_2');
    });
</script>
@endpush