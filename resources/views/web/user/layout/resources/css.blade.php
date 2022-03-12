<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/bootstrap.min.css')}}" />

<!-- animate -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/animate.css')}}" />

<!-- fontawesome -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/fontawesome/css/all.css')}}" />

<!-- themify -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/themify-icons.css')}}" />

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/flaticon.css')}}" />

<!-- slick -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/slick.css')}}">

<!-- REVOLUTION LAYERS STYLES -->

<link rel="stylesheet" type="text/css" href="{{asset('dist/user/revolution/css/layers.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('dist/user/revolution/css/settings.css')}}">

<!-- prettyphoto -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/prettyPhoto.css')}}">

<!-- shortcodes -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/shortcodes.css')}}" />

<!-- main -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/main.css')}}" />

<!-- main -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/megamenu.css')}}" />

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/responsive.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('dist/user/css/bootstrap-datetimepicker.css')}}" />

<style>
    .ttm-page-title-row {
        background-image: url('{{asset($coreComponent->banner)}}')
    }

        /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@stack('styles')