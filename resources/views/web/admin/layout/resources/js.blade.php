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
</script>

@include('sweetalert::alert')
@stack('scripts')