<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{ mix('vendor/adm/css/adm.css') }}" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div id="adm">
        @yield('content')
    </div>
</body>
<script src="{{ mix('vendor/adm/js/adm.js') }}"></script>
</html>
