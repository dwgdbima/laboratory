<script src="{{asset('dist/user/js/jquery.min.js')}}"></script>
<script src="{{asset('dist/user/js/popper.min.js')}}"></script>
<script src="{{asset('dist/user/js/tether.min.js')}}"></script>
<script src="{{asset('dist/user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dist/user/js/jquery.easing.js')}}"></script>
<script src="{{asset('dist/user/js/jquery-waypoints.js')}}"></script>
<script src="{{asset('dist/user/js/jquery-validate.js')}}"></script>
<script src="{{asset('dist/user/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('dist/user/js/slick.min.js')}}"></script>
<script src="{{asset('dist/user/js/numinate.min.js')}}"></script>
<script src="{{asset('dist/user/js/imagesloaded.min.js')}}"></script>
<script src="{{asset('dist/user/js/jquery-isotope.js')}}"></script>
<script src="{{asset('dist/user/js/moment.min.js')}}"></script>
<script src="{{asset('dist/user/js/moment-with-locales.js')}}"></script>
<script src="{{asset('dist/user/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('dist/user/js/main.js')}}"></script>
<!-- Javascript end-->

<script>
    function formatRupiah(data){
        let	number_string = data.toString(),
            split	= number_string.split(','),
            sisa 	= split[0].length % 3,
            rupiah 	= split[0].substr(0, sisa),
            ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
                
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah + ',00';

        return 'Rp' + rupiah;
    }
</script>

@include('sweetalert::alert')
@stack('scripts')