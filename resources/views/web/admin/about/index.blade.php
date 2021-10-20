@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.abouts.update')}}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="model" value="about">
            <div class="row">
                <div class="col-md-12">
                    <x-forms.textarea id="desc" label="Kata Pengantar" name="desc" placeholder="Visi..." rows="5">
                        {{$about->desc}}
                    </x-forms.textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <x-forms.textarea id="vision" label="Visi" name="vision" placeholder="Visi..." rows="5">
                        {{$about->vision}}
                    </x-forms.textarea>
                </div>
                <div class="col-md-6">
                    <label for="">Misi</label>
                    <div class="input-group">
                        <input type="text" id="add_mission" class="form-control" placeholder="Tambah Data">
                        <input type="hidden" id="mission" name="mission">
                        <span class="input-group-append">
                            <button type="button" onclick="addMission()" class="btn btn-primary"><i
                                    class="fas fa-plus"></i></button>
                        </span>
                    </div>
                    <ul class="mt-3" id="missions">

                    </ul>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.abouts.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="model" value="chairman">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{asset($chairman->photo)}}" id="display-photo" class="img-fluid mb-3" alt="">
                </div>
                <div class="col-md-7">
                    <x-forms.input id="name" name="name" value="{{$chairman->name}}" placeholder="Nama Ketua"
                        label="Nama Ketua" required />
                    <x-forms.input id="title" name="title" value="{{$chairman->title}}" placeholder="Jabatan"
                        label="Nama Ketua" required />
                    <x-forms.textarea id="greeting" label="Sambutan" name="greeting" placeholder="Sambutan Ketua..."
                        rows="5">
                        {{$chairman->greeting}}
                    </x-forms.textarea>
                    <x-forms.input id="email" name="email" value="{{$chairman->email}}" placeholder="Email"
                        label="Email Ketua" required />
                    <div class="form-group">
                        <label for="">Sosial Media</label>
                        <ul id="social_medias" class="list-unstyled">

                        </ul>
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add-sosmed">Tambah
                            Data</a>
                    </div>
                    <x-forms.input-file id="photo" name="photo" label="Foto Profil Ketua" />
                </div>
                <button class="btn btn-block btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="modal-add-sosmed">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Sosial Media</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <x-forms.select2 id="icon" label="Sosial Media">
                    <option
                        value="[{&quot;name&quot;:&quot;facebook&quot;,&quot;icon&quot;:&quot;fab fa-facebook-f&quot;}]">
                        Facebook</option>
                    <option
                        value="[{&quot;name&quot;:&quot;twitter&quot;,&quot;icon&quot;:&quot;fab fa-twitter&quot;}]">
                        Twitter</option>
                    <option
                        value="[{&quot;name&quot;:&quot;instagram&quot;,&quot;icon&quot;:&quot;fab fa-instagram&quot;}]">
                        Instagram</option>
                    <option
                        value="[{&quot;name&quot;:&quot;google plus&quot;,&quot;icon&quot;:&quot;fab fa-google-plus-g&quot;}]">
                        Google Plus</option>
                    <option
                        value="[{&quot;name&quot;:&quot;linked in&quot;,&quot;icon&quot;:&quot;fab fa-linkedin-in&quot;}]">
                        LinkedIn</option>
                </x-forms.select2>
                <x-forms.input id="url" label="Url" placeholder="Url (Contoh: http://facebook.com/contoh)" />
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="addSosmed()">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@push('scripts')
<script>
    let sosmeds = @json($chairman->social_media);
    let missions = @json($about->mission);

    window.onload = function(){
        loopMission();
        loopSosmed();
    }
    
    // Missions
    function loopMission(){
        let element = $('#missions'),
            i = 0;

        element.empty();
        missions.map(mission => {
            element.append(`<input type="hidden" name="mission[][value]" value="${mission.value}">`);
            element.append(`<li>${mission.value}<a href="#" onclick="deleteMission(${i})" class="text-danger"><i class="fas fa-trash"></i></a></li>`)
            i++
        })
    }

    function addMission(){
        let value = $('#add_mission').val();
        if(value.length > 0){
            missions.push({'value': value});
        }
        loopMission();
    }

    function deleteMission(index)
    {
        event.preventDefault();
        
        delete missions[index];
        loopMission();
    }

    // SOSMED
    function loopSosmed(){
        let element = $('#social_medias'),
            i = 0;
    
        element.empty();
        sosmeds.map(sosmed => {
            element.append(`<input type="hidden" name="social_media[${i}][icon]" value="${sosmed.icon}">`);
            element.append(`<input type="hidden" name="social_media[${i}][name]" value="${sosmed.name}">`);
            element.append(`<input type="hidden" name="social_media[${i}][url]" value="${sosmed.url}">`);
            element.append(`
            <li>
                <i class="${sosmed.icon} mr-3"></i>${sosmed.name} (<a href="${sosmed.url}" target="_blank">${sosmed.url})</a>
                <a href="#" class="text-danger" onclick="deleteSosmed(${i})"><i class="fas fa-trash ml-2"></i></a>
            </li>`);
            i++
        })
    }

    function addSosmed()
    {
        let data_sosmed = JSON.parse($('#icon').val()),
            url_sosmed = $('#url').val();
        
        sosmeds.push({'icon': data_sosmed[0].icon, 'name': data_sosmed[0].name, 'url': url_sosmed})
        $('#modal-add-sosmed').modal('hide');
        loopSosmed();
    }

    function deleteSosmed(index)
    {
        event.preventDefault();

        delete sosmeds[index];
        loopSosmed();
    }

    
    $(function() {
        // Summernote
        $('#desc').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        })

        $('#greeting').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        })
    })

    $("#photo").change(function(){ 
        showUpload(this, '#display-photo');
    });
</script>
@endpush