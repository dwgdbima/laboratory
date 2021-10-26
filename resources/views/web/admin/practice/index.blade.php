@extends('web.admin.main')
@push('styles')
<link rel="stylesheet" href="{{asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        {{$dataTable->table()}}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.practices.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Praktikum</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @role('super-admin')
                    <x-forms.select-laboratory id="laboratory_id" name="laboratory_id" label="Pilih Laboratorium"
                        placeholder="Pilih Laboratorium">
                    </x-forms.select-laboratory>
                    @endrole
                    <x-forms.input id="create-title" name="title" label="Nama Praktikum" placeholder="Nama Praktikum"
                        :value="old('title')" required />
                    <x-forms.text-area id="desc" name="desc" label="Deskripsi" placeholder="Deskripsi">
                    </x-forms.text-area>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-edit" action="" method="post">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h4 class="modal-title">Edit Praktikum</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @role('super-admin')
                    <x-forms.select-laboratory id="edit-laboratory_id" name="laboratory_id" label="Pilih Laboratorium"
                        placeholder="Pilih Laboratorium">
                    </x-forms.select-laboratory>
                    @endrole
                    <x-forms.input id="edit-title" name="title" label="Nama Praktikum" placeholder="Nama Praktikum"
                        :value="old('title')" required />
                    <x-forms.text-area id="edit-desc" name="desc" label="Deskripsi" placeholder="Deskripsi">
                    </x-forms.text-area>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection
@push('scripts')
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendor/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
<script src="{{asset('dist/admin/js/customDataTables.js')}}"></script>
{{$dataTable->scripts()}}

<script>
    if(@json($errors->first('field')) == 'store'){
        $('#modal-create').modal();
    }

    if(@json($errors->first('field')) == 'update'){
        $('#modal-edit').modal();
        $('#form-edit').attr('action', @json($errors->first('url')))
    }

    $('#modal-edit').on('hide.bs.modal', function(){
        $('input').removeClass('is-invalid');
        $('.invalid-feedback').remove();
    });

    // CREATE
    function _create(){
        $('#modal-create').modal();
    }

    // EDIT
    function edit(e, id){
        e.preventDefault();
        
        let url = '{{route("admin.practices.edit", ":id")}}',
            url_update = '{{route("admin.practices.update", ":id")}}';
        url = url.replace(':id', id);
        url_update = url_update.replace(':id', id);

        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
                let practice = response.practice;
                let $newOption = $("<option selected='selected'></option>").val(practice.laboratory.id).text(practice.laboratory.name);

                $('#form-edit').attr('action', url_update);
                $('#edit-title').val(practice.title);
                $('#edit-desc').val(practice.desc);
                
                $("#edit-laboratory_id").append($newOption).trigger('change');
                $('#modal-edit').modal();
            }
        })
    }

    function _delete(e, id){
        e.preventDefault();
        
        let url = '{{route("admin.practices.destroy", ":id")}}';
        url = url.replace(':id', id);

        swal.fire({
            title: "Hapus Praktikum?",
            text: "Praktikum yang dihapus tidak bisa dikembalikan",
            icon: "warning",    
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        '_method': 'DELETE',
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
                        console.log(response);
                        $('#practice-table').DataTable().ajax.reload();
                        Swal.fire({
                            "title":"Berhasil Menghapus Praktikum!",
                            "text":"","showConfirmButton":false,
                            "icon":"success",
                            "toast":true,
                            "position":"top-end",
                            "showCloseButton":true
                        });
                    },
                })
            }
        });
    }
</script>
@endpush