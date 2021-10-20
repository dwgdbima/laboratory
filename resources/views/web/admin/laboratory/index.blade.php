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
            <form action="{{route('admin.laboratories.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Laboratorium</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-forms.input id="create-name" name="name" label="Nama Laboratorium"
                        placeholder="Nama Laboratorium" :value="old('name')" required />
                    <x-forms.input id="create-email" name="email" label="Email" placeholder="Email"
                        :value="old('email')" required />
                    <x-forms.input type="password" id="create-password" name="password" label="Password"
                        placeholder="Password" required />
                    <x-forms.input type="password" id="create-password-confirm" name="password_confirmation"
                        label="Konfirmasi Password" placeholder="Konfirmasi Password" required />
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
                    <h4 class="modal-title">Edit Laboratorium</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-forms.input id="edit-name" name="name" label="Nama Laboratorium" placeholder="Nama Laboratorium"
                        :value="old('name')" required />
                    <x-forms.input id="edit-email" name="email" label="Email" placeholder="Email" :value="old('email')"
                        required />
                    <x-forms.input type="password" id="edit-password" name="password" label="Password Baru"
                        placeholder="Password Baru" />
                    <x-forms.input type="password" id="edit-password-confirm" name="password_confirmation"
                        label="Konfirmasi Password Baru" placeholder="Konfirmasi Password Baru" />
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
        
        let url = '{{route("admin.laboratories.edit", ":id")}}',
            url_update = '{{route("admin.laboratories.update", ":id")}}';
        url = url.replace(':id', id);
        url_update = url_update.replace(':id', id);

        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
                let laboratory = response.laboratory;
                console.log(laboratory)

                $('#form-edit').attr('action', url_update);
                $('#edit-name').val(laboratory.name);
                $('#edit-email').val(laboratory.user.email);

                $('#modal-edit').modal();
            }
        })
    }

    function _delete(e, id){
        e.preventDefault();
        
        let url = '{{route("admin.laboratories.destroy", ":id")}}';
        url = url.replace(':id', id);

        swal.fire({
            title: "Hapus Laboratorium?",
            text: "Laboratorium yang dihapus tidak bisa dikembalikan",
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
                        $('#laboratory-table').DataTable().ajax.reload();
                        Swal.fire({
                            "title":"Berhasil Menghapus Laboratorium!",
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