@extends('web.admin.main')
@push('styles')
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.equipment.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    @role('super-admin')
                    <x-forms.select-laboratory id="laboratory_id" name="laboratory_id" label="Pilih Laboratorium"
                        placeholder="Pilih Laboratorium">
                    </x-forms.select-laboratory>
                    @endrole

                    <x-forms.content id="desc" name="desc" label="Deskripsi" placeholder="Deskripsi" rows="5">
                        {{old('desc')}}
                    </x-forms.content>
                </div>
                <div class="col-md-6">
                    <x-forms.input id="name" name="name" label="Nama" :value="old('name')" placeholder="Nama" />
                    <label for=" image" class="d-block">Gambar</label>
                    <img src="#" class="img-fluid mb-3" id="d-image" alt="">
                    <x-forms.input-file id="image" name="image" placeholder="Gambar" />
                </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $("#image").change(function(){ 
        showUpload(this, '#d-image');
    });
</script>
@endpush