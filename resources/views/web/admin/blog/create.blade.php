@extends('web.admin.main')
@push('styles')
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.blogs.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <x-forms.input id="title" name="title" :value="old('title')" label="Judul" placeholder="Judul" />
                    <x-forms.content id="content" name="content" label="Konten" placeholder="Konten" rows="5">
                        {{old('content')}}
                    </x-forms.content>
                </div>
                <div class="col-md-4">
                    <label for="thumbnail">Thumbnail</label>
                    <img src="#" class="img-fluid mb-3" id="d-thumbnail" alt="">
                    <x-forms.input-file id="thumbnail" name="thumbnail" placeholder="Thumbnail" />

                    <x-forms.select-category id="category" name="category" placeholder="Pilih Kategori"
                        label="Kategori">
                    </x-forms.select-category>
                    <x-forms.select-tag id="tag" name="tag" placeholder="Pilih Tag" label="Tag">
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
    $("#thumbnail").change(function(){ 
        showUpload(this, '#d-thumbnail');
    });

    let category = '{{old("category")}}',
        tags = @json(old('tag'));

    if(category.length > 0){
        let $newOption = $("<option selected='selected'></option>").val(category).text(category);
        $("#category").append($newOption).trigger('change');
    }

    if(tags !== null){
        tags.map(tag => {
            $("#tag").append($("<option selected='selected'></option>").val(tag).text(tag)).trigger('change');
        })
    }

</script>
@endpush