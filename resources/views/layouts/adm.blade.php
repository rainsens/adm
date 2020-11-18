<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('vendor/adm/skin/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/adm/skin/css/admin-form.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/adm/css/adm.css') }}" rel="stylesheet">
    
    <link rel="shortcut icon" href="vendor/adm/skin/img/favicon.ico">
    
    <!--[if lt IE 9]>
    <script src="{{ asset('vendor/adm/skin/js/html5shiv.js') }}"></script>
    <script src="{{ asset('vendor/adm/skin/js/respond.js') }}"></script>
    <![endif]-->
    
</head>

<body class="{{ $admAttributes['adm.body.class'] }}" style="{{ $admAttributes['adm.body.style'] }}">
    <div id="adm" class="{{ $admAttributes['adm.div.class'] }}">
        @yield('content')
    </div>
</body>

<script src="{{ asset('vendor/adm/skin/js/jquery.js') }}"></script>
<script src="{{ asset('vendor/adm/skin/js/jquery-ui.js') }}"></script>
<script src="{{ asset('vendor/adm/skin/js/canvasbg.js') }}"></script>
<script src="{{ asset('vendor/adm/skin/js/utility.js') }}"></script>
<script src="{{ asset('vendor/adm/skin/js/adm.js') }}"></script>
<script src="{{ asset('vendor/adm/skin/js/main.js') }}"></script>
<script src="{{ asset('vendor/adm/js/adm.js') }}"></script>

<script>
    $(function () {
        "use strict";
        Core.init();
        Adm.init();
    });
</script>

@stack('foot')
@yield('scripts')

</html>
