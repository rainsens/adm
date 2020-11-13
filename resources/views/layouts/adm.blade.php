<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Zhihu') }}</title>
    <link href="{{ asset('vendor/adm/css/index.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
<script src="https://unpkg.com/vue@2.6.12/dist/vue.js"></script>
<script src="https://unpkg.com/element-ui@2.14.1/lib/index.js"></script>
<script src="{{ asset('vendor/adm/js/adm.js') }}"></script>
</html>
