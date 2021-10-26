@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.contact.update')}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <x-forms.textarea id="address" label="Alamat" name="address" placeholder="Alamat..." rows="5">
                        {{$contact->address}}
                    </x-forms.textarea>
                    <x-forms.input id="phone" name="phone" value="{{$contact->phone}}" placeholder="Nomor Telepon"
                        label="Nomor Telepon" required />
                    <div class="form-group">
                        <label for="">Sosial Media</label>
                        <ul id="social_medias" class="list-unstyled">

                        </ul>
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add-sosmed">Tambah
                            Data</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <x-forms.textarea id="map" label="Map" name="map" placeholder="Alamat..." rows="5">
                        {!!$contact->map!!}
                    </x-forms.textarea>
                    <x-forms.input id="email" name="email" value="{{$contact->email}}" placeholder="Email" label="Email"
                        required />
                </div>
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
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
    let sosmeds = @json($contact->social_media);

    window.onload = function(){
        loopSosmed();
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
</script>
@endpush