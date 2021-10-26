@extends('web.admin.main')
@push('styles')
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.blogs.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <x-forms.input id="title" name="title" label="Judul" placeholder="Judul" />
                    <x-forms.textarea id="content" name="content" label="Konten" placeholder="Konten" rows="5">
                    </x-forms.textarea>
                </div>
                <div class="col-md-6">
                    <label for="thumbnail">Thumbnail</label>
                    <img src="#" class="img-fluid mb-3" id="d-thumbnail" alt="">
                    <x-forms.input-file id="thumbnail" name="thumbnail" placeholder="Thumbnail" />
                    <x-forms.select-category id="category" name="category" placeholder="Pilih Kategori"
                        label="Kategori">
                    </x-forms.select-category>
                    <x-forms.select-tag id="tag" name="tag[]" placeholder="Pilih Tag" label="Tag">
                    </x-forms.select-tag>
                </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#content').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
        ]
    })

    $("#thumbnail").change(function(){ 
        showUpload(this, '#d-thumbnail');
    });
</script>
@endpush