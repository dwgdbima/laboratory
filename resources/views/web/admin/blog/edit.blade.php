@extends('web.admin.main')
@push('styles')
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.blogs.update', $blog->slug)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-8">
                    <x-forms.input id="title" name="title" label="Judul" value="{{$blog->title}}" placeholder="Judul" />
                    <x-forms.content id="content" name="content" label="Konten" placeholder="Konten" rows="5">
                        {{$blog->content}}
                    </x-forms.content>
                </div>
                <div class="col-md-4">
                    <label for="thumbnail">Thumbnail</label>
                    <img src="{{asset($blog->thumbnail)}}" class="img-fluid mb-3" id="d-thumbnail" alt="">
                    <x-forms.input-file id="thumbnail" name="thumbnail" placeholder="Thumbnail" />
                    <x-forms.select-category id="category" name="category" placeholder="Pilih Kategori"
                        label="Kategori">
                        @foreach ($blog->categories as $category)
                        <option value="{{$category->name}}" selected="selected">{{$category->name}}</option>
                        @endforeach
                    </x-forms.select-category>
                    <x-forms.select-tag id="tag" name="tag[]" placeholder="Pilih Tag" label="Tag">
                        @foreach ($blog->tags as $tag)
                        <option value="{{$tag->name}}" selected="selected">{{$tag->name}}</option>
                        @endforeach
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
</script>
@endpush