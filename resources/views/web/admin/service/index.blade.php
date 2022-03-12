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
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add-service">
           <i class="fas fa-plus"></i> Tambah Layanan
        </button>
        <table class="table table-hover" id="service-table">
            <thead>
                <tr>
                    <th>Laboratorium</th>
                    <th>Nama Layanan</th>
                    <th class="text-center">Satuan</th>
                    <th>Catatan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
  
  <!-- Modal -->
<form action="{{ route('admin.services.store') }}" method="post">
    @csrf
    <div class="modal fade" id="add-service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Pilih Laboratorium</label>
                            <select name="laboratory_id" class="form-control" id="create_laboratory_id" style="width: 100%" required>
                                <option></option>
                                @foreach ($laboratories as $laboratory)
                                <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nama Layanan</label>
                            <input type="text" class="form-control" name="name" id="create_name" placeholder="Masukan Nama Layanan" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Pilih Satuan</label>
                            <select name="unit_id" class="form-control" id="create_unit_id" style="width: 100%" required>
                                <option></option>
                                @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Jumlah Alat</label>
                            <input type="number" class="form-control" name="quantity" id="create_quantity" placeholder="Masukan Jumlah Ketersediaan Alat (Jika Alat)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Catatan</label>
                            <textarea name="note" id="create_note" class="form-control" name="note" cols="10" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Mahasiswa Jurusan Teknik Pertambangan UPN</label>
                            <input type="number" class="form-control" name="price1" placeholder="Masukan Harga Untuk Mahasiswa Jurusan Teknik Pertambangan UPN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Mahasiswa UPN</label>
                            <input type="number" class="form-control" name="price2" placeholder="Masukan Harga Untuk Harga Mahasiswa UPN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Mahasiswa Luar UPN</label>
                            <input type="number" class="form-control" name="price3" placeholder="Masukan Harga Untuk Harga Mahasiswa Luar UPN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Proyek(umum) dan Penelitian</label>
                            <input type="number" class="form-control" name="price4" placeholder="Masukan Harga Untuk Harga Proyek(umum) dan Penelitian" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('admin.services.store') }}" method="post">
    @csrf
    <div class="modal fade" id="add-service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Pilih Laboratorium</label>
                            <select name="laboratory_id" class="form-control" id="create_laboratory_id" style="width: 100%" required>
                                <option></option>
                                @foreach ($laboratories as $laboratory)
                                <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nama Layanan</label>
                            <input type="text" class="form-control" name="name" id="create_name" placeholder="Masukan Nama Layanan" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Pilih Satuan</label>
                            <select name="unit_id" class="form-control" id="create_unit_id" style="width: 100%" required>
                                <option></option>
                                @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Jumlah Alat</label>
                            <input type="number" class="form-control" name="quantity" id="create_quantity" placeholder="Masukan Jumlah Ketersediaan Alat (Jika Alat)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Catatan</label>
                            <textarea name="note" id="create_note" class="form-control" name="note" cols="10" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Mahasiswa Jurusan Teknik Pertambangan UPN</label>
                            <input type="number" class="form-control" name="price1" placeholder="Masukan Harga Untuk Mahasiswa Jurusan Teknik Pertambangan UPN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Mahasiswa UPN</label>
                            <input type="number" class="form-control" name="price2" placeholder="Masukan Harga Untuk Harga Mahasiswa UPN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Mahasiswa Luar UPN</label>
                            <input type="number" class="form-control" name="price3" placeholder="Masukan Harga Untuk Harga Mahasiswa Luar UPN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Proyek(umum) dan Penelitian</label>
                            <input type="number" class="form-control" name="price4" placeholder="Masukan Harga Untuk Harga Proyek(umum) dan Penelitian" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="" method="post" id="form-edit">
    @csrf
    @method('put')
    <div class="modal fade" id="edit-service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Pilih Laboratorium</label>
                            <select name="laboratory_id" class="form-control" id="edit_laboratory_id" style="width: 100%" required>
                                <option></option>
                                @foreach ($laboratories as $laboratory)
                                <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nama Layanan</label>
                            <input type="text" class="form-control" name="name" id="edit_name" placeholder="Masukan Nama Layanan" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Pilih Satuan</label>
                            <select name="unit_id" class="form-control" id="edit_unit_id" style="width: 100%" required>
                                <option></option>
                                @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Jumlah Alat</label>
                            <input type="number" class="form-control" name="quantity" id="edit_quantity" placeholder="Masukan Jumlah Ketersediaan Alat (Jika Alat)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Catatan</label>
                            <textarea name="note" id="edit_note" class="form-control" name="note" cols="10" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Mahasiswa Jurusan Teknik Pertambangan UPN</label>
                            <input type="number" class="form-control" name="price1" id="edit_price1" placeholder="Masukan Harga Untuk Mahasiswa Jurusan Teknik Pertambangan UPN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Mahasiswa UPN</label>
                            <input type="number" class="form-control" name="price2" id="edit_price2" placeholder="Masukan Harga Untuk Harga Mahasiswa UPN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Mahasiswa Luar UPN</label>
                            <input type="number" class="form-control" name="price3" id="edit_price3" placeholder="Masukan Harga Untuk Harga Mahasiswa Luar UPN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Harga Proyek(umum) dan Penelitian</label>
                            <input type="number" class="form-control" name="price4" id="edit_price4" placeholder="Masukan Harga Untuk Harga Proyek(umum) dan Penelitian" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="detail-service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Laboratorium</dt>
                    <dd class="col-sm-8" data-name="laboratory">#</dd>
                    <dt class="col-sm-4">Nama Layanan</dt>
                    <dd class="col-sm-8" data-name="service">#</dd>
                    <dt class="col-sm-4">Satuan</dt>
                    <dd class="col-sm-8" data-name="unit">#</dd>
                    <dt class="col-sm-4">Catatan</dt>
                    <dd class="col-sm-8" data-name="note">#</dd>
                    <dt class="col-sm-4">Jumlah Alat</dt>
                    <dd class="col-sm-8" data-name="quantity">#</dd>
                    <dt class="col-sm-4">Harga Mahasiswa</dt>
                    <dd class="col-sm-8" data-name="1">#</dd>
                    <dt class="col-sm-4">Harga Mahasiswa</dt>
                    <dd class="col-sm-8" data-name="2">#</dd>
                    <dt class="col-sm-4">Harga Mahasiswa</dt>
                    <dd class="col-sm-8" data-name="3">#</dd>
                    <dt class="col-sm-4">Harga Mahasiswa</dt>
                    <dd class="col-sm-8" data-name="4">#</dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
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

<script>
    $(document).ready(function(){
        let groupColumn = 0,
            table = $('#service-table').DataTable({
            columnDefs: [
                { 
                    visible: false, 
                    targets: groupColumn
                },
            ],
            order: [[ groupColumn, 'asc' ]],
            displayLength: 25,
            drawCallback: function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
    
                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group bg-light text-center"><td colspan="4"><b>'+group+'</b></td></tr>'
                        );
                        last = group;
                    }
                });
            },
            processing: true, 
            serverSide: true, 
            ajax: "{{ route('admin.services.index') }}", 
            columns: [ 
                {data: 'laboratory.name', name: 'laboratory.name'}, 
                {data: 'name', name: 'name', width: '30%'}, 
                {data: 'unit.name', name: 'unit.name', width: '10%', className: 'text-center'}, 
                {data: 'note', name: 'note'}, 
                {data: 'action', name: 'action', width: '10%', className: 'text-center'}
            ]
        });

        $('#service-table tbody').on( 'click', 'tr.group', function () {
            let currentOrder = table.order()[0];
            if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                table.order( [ groupColumn, 'desc' ] ).draw();
            }
            else {
                table.order( [ groupColumn, 'asc' ] ).draw();
            }
        } );
    });

    $( "#create_laboratory_id" ).select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Laboratorium',
    });
    
    $( "#create_unit_id" ).select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Satuan',
    });

    function detail(id)
    {
        let url = '{{route("service.show", ":id")}}';
            url = url.replace(':id', id),

        $.get(url, function(data, status){
            let service = data.service;
            $('dd[data-name="laboratory"]').text(service.laboratory.name);
            $('dd[data-name="service"]').text(service.name);
            $('dd[data-name="unit"]').text(service.unit.name);
            $('dd[data-name="note"]').text(service.note == null ? '-' : service.note);
            $('dd[data-name="quantity"]').text(service.quantity == null ? '-' : service.quantity);
            $('dd[data-name="1"]').text(formatRupiah(service.service_prices.find(el => el.customer_status_id == 1).price));
            $('dd[data-name="2"]').text(formatRupiah(service.service_prices.find(el => el.customer_status_id == 2).price));
            $('dd[data-name="3"]').text(formatRupiah(service.service_prices.find(el => el.customer_status_id == 3).price));
            $('dd[data-name="4"]').text(formatRupiah(service.service_prices.find(el => el.customer_status_id == 4).price));

            $('#detail-service').modal('show');
        });
    }

    function edit(id)
    {
        let url = '{{route("service.show", ":id")}}',
            url_update = '{{route("admin.services.update", ":id")}}';
            url = url.replace(':id', id);
            url_update = url_update.replace(':id', id);

            $('#form-edit').attr('action', url_update);

        $.get(url, function(data, status){
            let service = data.service;
            $('#edit_name').val(service.name);
            $('#edit_note').val(service.note);
            $('#edit_quantity').val(service.quantity);
            $('#edit_price1').val(service.service_prices.find(el => el.customer_status_id == 1).price);
            $('#edit_price2').val(service.service_prices.find(el => el.customer_status_id == 2).price);
            $('#edit_price3').val(service.service_prices.find(el => el.customer_status_id == 3).price);
            $('#edit_price4').val(service.service_prices.find(el => el.customer_status_id == 4).price);
            $('#edit_laboratory_id').val(service.laboratory_id);
            $('#edit_laboratory_id').trigger('change');
            $('#edit_unit_id').val(service.unit_id);
            $('#edit_unit_id').trigger('change');

            $('#edit-service').modal('show');
        });
    }

    function destroy(id)
    {
        let url = '{{route("admin.services.destroy", ":id")}}';
        url = url.replace(':id', id);

        swal.fire({
            title: "Hapus Layanan?",
            text: "Layanan yang dihapus tidak bisa dikembalikan",
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
                        $('#service-table').DataTable().ajax.reload();
                        Swal.fire({
                            "title":"Berhasil Menghapus Layanan!",
                            "text":"","showConfirmButton":false,
                            "icon":"success",
                            "toast":true,
                            "position":"top-end",
                            "showCloseButton":true
                        });
                        console.log(response);
                    },
                })
            }
        });
    }
</script>
@endpush