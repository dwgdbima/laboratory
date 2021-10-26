@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <label for="icon" class="d-block">Icon</label>
                    <img src="{{asset($component->icon)}}" id="d-icon" class="img-fluid mb-3" alt="">
                    <x-forms.input-file id="icon" name="icon" placeholder="Klik Disini Untuk Mengubah Icon" />
                </div>
                <div class="col-md-6">
                    <label for="favicon" class="d-block">Favicon</label>
                    <img src="{{asset($component->favicon)}}" id="d-favicon" class="img-fluid mb-3" alt="">
                    <x-forms.input-file id="favicon" name="favicon" placeholder="Klik Disini Untuk Mengubah Favicon" />
                </div>
            </div>
            <div class="row">
                <label for="banner" class="d-block"></label>
                <div class="col-md-6">
                    <label for="banner">Banner</label>
                    <img src="{{asset($component->banner)}}" id="d-banner" class="img-fluid mb-3" alt="">
                    <x-forms.input-file id="banner" name="banner" placeholder="Klik Disini Untuk Mengubah Banner" />
                </div>
            </div>
            <button class="btn btn-block btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $("#icon").change(function(){ 
        showUpload(this, '#d-icon');
    });
    $("#favicon").change(function(){ 
        showUpload(this, '#d-favicon');
    });
    $("#banner").change(function(){ 
        showUpload(this, '#d-banner');
    });
</script>
@endpush