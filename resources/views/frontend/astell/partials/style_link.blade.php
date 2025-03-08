<head>

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=3, user-scalable=yes" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DadaBhaai</title>

    <link rel="shortcut icon"
        href="{{ $site->favicon ? asset('upload/favicon/' . $site->favicon) : asset('upload/no_image.jpg') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend/astell/assets/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/astell/assets/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/astell/assets/css/video-js.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/astell/assets/css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/astell/assets/css/main4451.css?v=1.0.11217') }}" />
</head>
