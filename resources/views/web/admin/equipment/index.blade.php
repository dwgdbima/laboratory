@extends('web.admin.main')
@push('styles')
<link rel="stylesheet" href="{{asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/ekko-lightbox/ekko-lightbox.css')}}">
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        {{$dataTable->table()}}
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendor/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
<script src="{{asset('dist/admin/js/customDataTables.js')}}"></script>
<script src="{{asset('vendor/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
{{$dataTable->scripts()}}

<script>
    function _delete(e, id)
    {
        e.preventDefault();
        
        let url = '{{route("admin.equipments.destroy", ":id")}}';
        url = url.replace(':id', id);

        swal.fire({
            title: "Hapus Berita?",
            text: "Berita yang dihapus tidak bisa dikembalikan",
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
                        $('#equipment-table').DataTable().ajax.reload();
                        Swal.fire({
                            "title":"Berhasil Menghapus Berita!",
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

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });
</script>
@endpush