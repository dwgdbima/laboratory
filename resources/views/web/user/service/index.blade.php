@extends('web.user.main')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/select2.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/select2-bootstrap.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/daterangepicker.css')}}" />
<style>
    .table thead th{
        vertical-align: middle;
    }
    .table tbody td{
        vertical-align: middle;
    }
</style>
@endpush
@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row d-flex flex-row align-items-center justify-content-between">
                <div class="page-title-heading">
                    <h2 class="title">Layanan</h2>
                </div>
                <div class="breadcrumb-wrapper">
                    <span>
                        <a title="Homepage" href="{{'/'}}">Beranda</a>
                    </span>
                    <span>Layanan</span>
                </div>
            </div>
        </div>
    </div>
</div><!-- page-title end-->

<!--site-main start-->
<div class="site-main">
    <!-- cta-info-section -->
    <section class="ttm-row cta-info-section ttm-bgcolor-grey bg-layer bg-layer-equal-height clearfix">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered small-table table-hover">
                    <thead class="text-center thead-light">
                        <tr>
                            <th rowspan="2" style="width: 380px;">Jenis Layanan</th>
                            <th rowspan="2" style="width: 110px">Satuan</th>
                            <th rowspan="2">Catatan</th>
                            <th colspan="4">Tarif</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th style="width: 210px">Mahasiswa Jurusan Teknik Pertambangan UPN</th>
                            <th style="width: 160px">Mahasiswa UPN</th>
                            <th style="width: 160px">Mahasiswa Luar UPN</th>
                            <th style="width: 160px">Proyek (umum) dan Penelitian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laboratories as $laboratory)
                        <tr>
                            <td colspan="8" class="text-center bg-light"><b>{{ $laboratory->name }}</b></td>
                        </tr>
                        @foreach ($laboratory->services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td class="text-center">{{ $service->unit->name }}</td>
                            <td>{{ $service->note }}</td>
                            @foreach ($service->servicePrices as $servicePrice)
                            <td style="text-align: right">@rupiah($servicePrice->price)</td>                             
                            @endforeach
                            <td><a href="#" class="btn btn-primary btn-small" onclick="order({{ $service->id }}), event.preventDefault();">Pesan</a></td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-grey z-index-1">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                        <div class="layer-content">
                            
                            <!-- testimonial-box -->
                            <div class="pt-45 pl-50 pb-50 pr-50 res-991-pl-15 res-991-pr-15 res-991-pt-30">
                                <!-- section-title -->
                                <div class="section-title">
                                    <div class="title-header">
                                        <h2 class="title">Pesan Layanan</h2>
                                    </div>
                                </div><!-- section-title end -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-info-section end -->
</div>
<!--site-main end-->
<!-- Modal -->
<form id="ttm-contactform-2" class="ttm-contactform-2 wrap-form clearfix" method="post" action="{{ route('order.store') }}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="service_id">
<input type="hidden" name="unit">
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="order_name" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="order_name">Buat Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading" id="service_name"></h4>
                    <hr>
                    <p class="mb-0" id="service_note"></p>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Nomor HP</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Masukan Nomor HP" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="customer_status">Status Pelanggan</label>
                        <select name="customer_status_id" class="form-control" id="customer_status" style="width: 100%" required>
                            <option></option>
                            @foreach ($customerStatuses as $customerStatus)
                            <option value="{{ $customerStatus->id }}">{{ $customerStatus->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="service">Kartu Identitas (KTM/KTP)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="identity_card" name="identity_card" required>
                                <label class="custom-file-label" id="identity_card_label" for="identity_card">Choose file (max: 1 mb)</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6" id="date_range_picker">
                        <label for="date_range">Tanggal Pelayanan</label>
                        <input type="text" class="form-control" placeholder="Input Tanggal Pelayanan" id="date_range" name="date_range" autocomplete="off" disabled>
                        <input type="hidden" id="start_date" name="start_date">
                        <input type="hidden" id="end_date" name="end_date">
                        <input type="hidden" id="date" name="date">
                    </div>
                </div>
                <div class="form-row" id="form_quantity">
                    <div class="form-group col-md-6">
                        <label for="quantity">Jumlah Unit</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" min="1" placeholder="Maukan Jumlah" value="1" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <h5 class="mr-auto mb-0" id="total_price">Total Harga: </h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pesan</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection

@push('scripts')
<script src="{{asset('dist/user/js/select2.min.js')}}"></script>
<script src="{{asset('dist/user/js/daterangepicker.js')}}"></script>

<script>
    moment.locale("id");

    function order(service_id){
        let service,
            price,
            unit,
            url = '{{route("service.show", ":id")}}';
            url = url.replace(':id', service_id);
        
        $( "#customer_status" ).select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Status Pelanggan',
            allowClear: true
        });

        $.get(url, function(data, status){
            console.log(data.available_service == true ? true : false);
            service = data.service;
            unit = service.unit.slug;
            if(data.available_service == true){
                $('input[name="service_id"]').val(service_id);
                $('input[name="unit"]').val(unit);
    
                $('#service_name').text(service.name);
                $('#service_note').text(service.note == null ? '' : service.note);
                $('#order').modal('show');
                
                if(unit == 'per-hari'){
                    $('#date_range').daterangepicker({
                        minDate:new Date(),
                        autoUpdateInput: false,
                        locale: {
                            cancelLabel: 'Clear'
                        }
                    });
                    $('#form_quantity').addClass('d-none')
                }else{
                    $('#date_range').daterangepicker({
                        minDate:new Date(),
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                            cancelLabel: 'Clear'
                        }
                    });
                    $('#form_quantity').removeClass('d-none')
                }
            }else{
                swal.fire({
                    title: "Layanan Tidak Tersedia",
                    text: "Layanan yang anda pilih sedang penuh",
                    icon: "warning",
                })
            }

            // Customer Status
            $('#customer_status').on('change', function() {
                let customer_status_id = $(this).val(),
                    service_price = service.service_prices.find(el => el.customer_status_id == customer_status_id);
                
                price = service_price == undefined ? undefined : service_price.price;
                
                if(price == undefined){
                    $('#date_range').prop("disabled", true);
                    $('#quantity').prop("disabled", true);
                }else{
                    $('#date_range').prop("disabled", false);
                    $('#quantity').prop("disabled", false);
                    $('#total_price').text('Total Harga: ' + formatRupiah(price));
                }
            })

            // Select Date Range
            $('#date_range').on('apply.daterangepicker', function(ev, picker) {
                let start = new Date(picker.startDate.format('YYYY-MM-DD')),
                    end = new Date(picker.endDate.format('YYYY-MM-DD')),
                    Difference_In_Time = end.getTime() - start.getTime(),
                    Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24) + 1;

                if(unit == 'per-hari'){
                    $("#start_date").val(picker.startDate.format('YYYY-MM-DD'));
                    $("#end_date").val(picker.endDate.format('YYYY-MM-DD HH:mm:ss'));
                    
                    $(this).val(picker.startDate.format('D MMMM YYYY') + ' - ' + picker.endDate.format('D MMMM YYYY') + ' (' + Difference_In_Days + ' Hari)');
                    $('#total_price').text('Total Harga: ' + formatRupiah(price * Difference_In_Days))
                }else{
                    $("#date").val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
                    $(this).val(picker.startDate.format('D MMMM YYYY'));
                }
            });

            $('#date_range').on('cancel.daterangepicker', function(ev, picker) {
                $("#start_date").val('');
                $("#end_date").val('');
                $("#date").val('');
                $(this).val('');
            });

            $('#quantity').on('change', function(){
                let value = $(this).val();
                $('#total_price').text('Total Harga: ' + formatRupiah(value * price));
            })
        });
    }

    $('#order').on('hide.bs.modal', function(){
        $('#name').text('');
        $('#phone').text('');
        $('#email').text('');
        $('#identity_card_label').text('Choose File (max: 1 mb)');
        $('#total_price').text('Total Harga:');
        $('#customer_status').val(null).trigger('change');
        $('#date_range').val('');
        $('#start_date').val('');
        $('#end_date').val('');
        $('#date').val('');
        $('#identity_card').val('');
        $('#quantity').val('1');
    });

    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        let fileName = document.getElementById("identity_card").files[0].name,
            nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    })
</script>
@endpush