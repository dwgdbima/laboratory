@extends('web.user.main')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/select2.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/select2-bootstrap.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/daterangepicker.css')}}" />

</style>
@endpush
@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row d-flex flex-row align-items-center justify-content-between">
                <div class="page-title-heading">
                    <h2 class="title">Bukti Pembayaran</h2>
                </div>
                <div class="breadcrumb-wrapper">
                    <span>
                        <a title="Homepage" href="{{'/'}}">Beranda</a>
                    </span>
                    <span>Bukti Pembayaran</span>
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
            <div class="card-body">
                <form action="{{ route('payment.proof.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4 m-auto">
                        <div class="form-group col-md-12">
                            <label for="">ID Pemesanan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="order_id" value="{{ $order_id }}" required>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Token</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="token" value="{{ $token }}" required>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Upload Bukti Pembayaran</label>
                            <div class="input-group">
                                <input type="file" class="custom-file-input" id="payment_proof" name="payment_proof" required>
                                <label class="custom-file-label" id="payment_proof_label" for="payment_proof">Choose file (max: 1 mb)</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- cta-info-section end -->
</div>
<!--site-main end-->
@endsection

@push('scripts')
<script src="{{asset('dist/user/js/select2.min.js')}}"></script>
<script src="{{asset('dist/user/js/daterangepicker.js')}}"></script>

<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        let fileName = document.getElementById("payment_proof").files[0].name,
            nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    })
</script>
@endpush