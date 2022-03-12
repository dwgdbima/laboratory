<script>
  paceOptions = {
        catchupTime: 100,
        initialRate: .03,
        minTime: 250,
        ghostTime: 100,
        maxProgressPerFrame: 20,
        easeFactor: 1.25,
        startOnPageLoad: true,
        restartOnPushState: true,
        restartOnRequestAfter: 500,
        target: 'body',
        elements: {
            checkInterval: 100,
            selectors: ['body']
        },
        eventLag: {
            minSamples: 10,
            sampleCount: 3,
            lagThreshold: 3
        },
        ajax: {
            trackMethods: ['GET'],
            trackMethods: ['POST'],
            trackWebSockets: true,
            ignoreURLs: []
        }
    }
</script>
<script src="{{ asset('dist/admin/js/app.js') }}"></script>
<script>
  function showUpload(input, id) {
        let url = input.value,
             ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }else{
            $(id).attr('src', '/assets/no_preview.png');
        }
    }

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

    //SweetAlert2 Toast
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 3000
    });
</script>

@include('sweetalert::alert')
@stack('scripts')