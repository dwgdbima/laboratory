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
<div class="modal fade" id="detail-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">

                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
{{$dataTable->scripts()}}

<script>
    function show(id)
    {
        let url = '{{route("admin.orders.show", ":id")}}';
            url = url.replace(':id', id);

        $.get(url, function(data, status){
            let file = '{{route("files.show", ":path")}}',
                identity_card = file.replace(':path', data.identity_card),
                payment_proof = file.replace(':path', data.payment_proof);

            $('#detail-order').find('dl.row').html(`
                <dt class="col-sm-4">ID Pemesanan</dt>
                <dd class="col-sm-8">${data.order_id}</dd>
                <dt class="col-sm-4">Token</dt>
                <dd class="col-sm-8">${data.token == null ? '-' : data.token}</dd>
                <dt class="col-sm-4">Layanan</dt>
                <dd class="col-sm-8">${data.service.name}</dd>
                <dt class="col-sm-4">Nama</dt>
                <dd class="col-sm-8">${data.name}</dd>
                <dt class="col-sm-4">No. Telp</dt>
                <dd class="col-sm-8">${data.phone}</dd>
                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8">${data.email}</dd>
                <dt class="col-sm-4">Status Pelanggan</dt>
                <dd class="col-sm-8">${data.customer_status.name}</dd>
                <dt class="col-sm-4">Kartu Identitas</dt>
                <dd class="col-sm-8">
                    <a href="${identity_card}" target="_blank"><img src="${identity_card}" class="img-fluid" style="width: 30%;"></a>
                </dd>
                <dt class="col-sm-4">Tanggal Pelayanan</dt>
                ${data.service.unit.slug == 'per-hari' ? '<dd class="col-sm-8">'+ moment(data.start_date, 'YYYY-MM-DD hh:mm:ss').format('DD/MM/YYYY') + ' - ' + moment(data.end_date, 'YYYY-MM-DD hh:mm:ss').format('DD/MM/YYYY') + '</dd>' : '<dd class="col-sm-8">' + moment(data.date, 'YYYY-MM-DD hh:mm:ss').format('DD/MM/YYYY') +'</dd>'}
                ${data.service.unit.slug == 'per-hari' ? '' : '<dt class="col-sm-4">Jumlah Satuan</dt><dd class="col-sm-8">'+ data.quantity + '</dd>'}
                <dt class="col-sm-4">Harga</dt>
                <dd class="col-sm-8">${formatRupiah(data.price)}</dd>
                <dt class="col-sm-4">Persetujuan Pemesanan</dt>
                <dd class="col-sm-8">
                    ${data.acceptance == 0 ? '<span class="badge badge-warning"><i class="fas fa-clock"></i> Tertunda</span>' : 
                    data.acceptance == 1 ? '<span class="badge badge-success"><i class="fas fa-check"></i> Disetujui</span>' : 
                    '<span class="badge badge-danger"><i class="fas fa-times"></i> Ditolak</span>'} 
                    <button class="btn btn-xs btn-primary" onclick="acceptance(${data.id})"><i class="fas fa-edit"></i>Action</button>
                </dd>
                <dt class="col-sm-4">Bukti Pembayaran</dt>
                <dd class="col-sm-8">${data.payment_proof == null ? '-' : '<a href="'+payment_proof+'" target="_blank"><img src="'+payment_proof+'" class="img-fluid" style="width: 30%;"></a>'}</dd>
                <dt class="col-sm-4">Status Pembayaran</dt>
                <dd class="col-sm-8">
                    ${data.payment == 0 ? '<span class="badge badge-warning"><i class="fas fa-clock"></i> Belum Bayar</span>' :
                    data.payment == 1 ? '<span class="badge badge-success"><i class="fas fa-check"></i> Lunas</span>' :
                    '<span class="badge badge-danger"><i class="fas fa-exclamation"></i> Baru</span>'} 
                    <button class="btn btn-xs btn-primary" onclick="payment(${data.id})"><i class="fas fa-edit"></i>Action</button>
                </dd>
            `)

            $('#detail-order').modal('show');
        })
    }

    function acceptance(id)
    {
        let url = '{{route("admin.orders.acceptance", ":id")}}';
            url = url.replace(':id', id);

        $('#detail-order').modal('hide');

        swal.fire({
            title: "Persetujuan Pesanan",
            text: "Pilih Setuju atau Tolak Pesanan",
            icon: "warning",   
            showDenyButton: true, 
            showCancelButton: true,
            confirmButtonText: "Setuju",
            denyButtonText: "Tolak"
        }).then((result) => {
            if(result.isConfirmed){
                $.post(url,
                {
                    acceptance: 1,
                    _method: 'POST',
                    _token: '{{csrf_token()}}'
                },
                function(data, status){
                    console.log(data);
                    $('#order-table').DataTable().ajax.reload();
                    Toast.fire({icon: 'success', title: 'Pesanan berhasil disetujui'});
                });
            }else if(result.isDenied){
                (async () => {
                    const { value: reason } = await Swal.fire({
                        input: 'textarea',
                        inputLabel: 'Alasan Penolakan',
                        inputPlaceholder: 'Masukan pesan disini...',
                        inputAttributes: {
                            'aria-label': 'Masukan pesan disini'
                        },
                        showCancelButton: true
                    })

                    if (reason) {
                        console.log(reason)
                        $.post(url,
                        {
                            acceptance: 2,
                            reason: reason,
                            _method: 'POST',
                            _token: '{{csrf_token()}}'
                        },
                        function(data, status){
                            $('#order-table').DataTable().ajax.reload();
                            Toast.fire({icon: 'success', title: 'Pesanan berhasil ditolak'});
                        });
                    }
                })();
            }
        });
    }

    function payment(id)
    {
        let url = '{{route("admin.orders.payment", ":id")}}';
            url = url.replace(':id', id);

        $('#detail-order').modal('hide');

        swal.fire({
            title: "Persetujuan Pembayaran",
            text: "Pilih Setuju atau Tolak Pembayaran",
            icon: "warning",   
            showDenyButton: true, 
            showCancelButton: true,
            confirmButtonText: "Setuju",
            denyButtonText: "Tolak"
        }).then((result) => {
            if(result.isConfirmed){
                $.post(url,
                {
                    payment: 1,
                    _method: 'POST',
                    _token: '{{csrf_token()}}'
                },
                function(data, status){
                    $('#order-table').DataTable().ajax.reload();
                    Toast.fire({icon: 'success', title: 'Pembayaran Berhasil Diterima'});
                });
            }else if(result.isDenied){
                (async () => {
                    const { value: reason } = await Swal.fire({
                        input: 'textarea',
                        inputLabel: 'Alasan Penolakan',
                        inputPlaceholder: 'Masukan pesan disini...',
                        inputAttributes: {
                            'aria-label': 'Masukan pesan disini'
                        },
                        showCancelButton: true
                    })

                    if (reason) {
                        $.post(url,
                        {
                            payment: 0,
                            reason: reason,
                            _method: 'POST',
                            _token: '{{csrf_token()}}'
                        },
                        function(data, status){
                            $('#order-table').DataTable().ajax.reload();
                            Toast.fire({icon: 'success', title: 'Pembayaran Berhasil Ditolak'});
                        });
                    }
                })();
            }
        });
    }

    function destroy(id)
    {
        let url = '{{route("admin.orders.destroy", ":id")}}';
            url = url.replace(':id', id);

        swal.fire({
            title: "Hapus Pesanan",
            text: "Pesanan yang dihapus tidak bisa dikembalikan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if(result.isConfirmed){
                $.post(url, 
                {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                },
                function(data, status){
                    $('#order-table').DataTable().ajax.reload();
                    Toast.fire({icon: 'success', title: 'Pesanan Berhasil Dihapus'});
                })
            }
        })
    }
</script>
@endpush