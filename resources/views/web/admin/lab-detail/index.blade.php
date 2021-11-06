@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.lab.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <x-forms.input id="name" name="name" :value="old('name', $laboratory->name)"
                        placeholder="Nama Laboratorium" label="Nama Laboratorium" />
                    <x-forms.input id="phone" name="phone" :value="old('phone', $laboratory->phone)"
                        placeholder="Nomor Telepon" label="Nomor Telepon" />
                    <x-forms.text-area id="address" name="address" placeholder="Alamat" label="Alamat">
                        {{old('address', $laboratory->address)}}
                    </x-forms.text-area>
                </div>
                <div class="col-md-6">
                    <label for="banner">Banner</label>
                    <img src="{{asset($laboratory->banner)}}" class="img-fluid mb-3" id="d-banner" alt="">
                    <x-forms.input-file id="banner" name="banner" />
                </div>
                <button type="submit" class="btn btn-block btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $("#banner").change(function(){ 
        showUpload(this, '#d-banner');
    });
</script>
@endpush