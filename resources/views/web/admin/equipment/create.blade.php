@extends('web.admin.main')
@push('styles')
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.equipments.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    @role('super-admin')
                    <x-forms.select2 id="laboratory_id" name="laboratory_id" label="Laboratorium"
                        placeholder="Pilih Laboratorium">
                        @foreach ($laboratories as $laboratory)
                        <option value=""></option>
                        <x-forms.option :old="old('laboratory_id')" value="{{$laboratory->id}}">{{$laboratory->name}}
                        </x-forms.option>
                        @endforeach
                    </x-forms.select2>
                    @endrole

                    <x-forms.textarea id="desc" name="desc" label="Deskripsi" placeholder="Deskripsi" rows="5">
                    </x-forms.textarea>
                </div>
                <div class="col-md-6">
                    <x-forms.input id="name" name="name" label="Nama" placeholder="Nama" />
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