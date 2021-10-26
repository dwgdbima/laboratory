@extends('web.admin.main')
@push('styles')
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.equipments.update', $equipment->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    @role('super-admin')
                    <x-forms.select-laboratory id="laboratory_id" name="laboratory_id" placeholder="Pilih Laboratorium"
                        label="Pilih Laboratorium">
                        <option value="{{$equipment->laboratory->id}}" selected="selected">
                            {{$equipment->laboratory->name}}</option>
                    </x-forms.select-laboratory>
                    @endrole

                    <x-forms.textarea id="desc" name="desc" label="Deskripsi" placeholder="Deskripsi" rows="5">
                        {{$equipment->desc}}
                    </x-forms.textarea>
                </div>
                <div class="col-md-6">
                    <x-forms.input id="name" name="name" value="{{$equipment->name}}" label="Nama" placeholder="Nama" />
                    <label for="image" class="d-block">Gambar</label>
                    <img src="{{asset($equipment->image)}}" class="img-fluid mb-3" id="d-image" alt="">
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
    $('#desc').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
        ]
    })

    $("#image").change(function(){ 
        showUpload(this, '#d-image');
    });
</script>
@endpush