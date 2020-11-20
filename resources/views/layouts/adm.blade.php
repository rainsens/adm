<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{ adm_asset('skin/css/theme.css') }}" rel="stylesheet">
    <link href="{{ adm_asset('skin/css/admin-form.css') }}" rel="stylesheet">
    
    @stack('cssfiles')
    
    <link rel="shortcut icon" href="{{ adm_asset('adm/skin/img/favicon.ico') }}">
    
    <!--[if lt IE 9]>
    <script src="{{ adm_asset('skin/js/html5shiv.js') }}"></script>
    <script src="{{ adm_asset('skin/js/respond.js') }}"></script>
    <![endif]-->
    
    @stack('styles')
    
</head>

<body
    class="{{ $admAttributes['adm.body.class'] }}"
    style="{{ $admAttributes['adm.body.style'] }}"
>

    <div id="adm" class="{{ $admAttributes['adm.div.class'] }}">
        @yield('main-content')
        <vue-progress-bar></vue-progress-bar>
    </div>

</body>

<script src="{{ adm_asset('skin/js/jquery.js') }}"></script>
<script src="{{ adm_asset('skin/js/jquery-ui.js') }}"></script>
<script src="{{ adm_asset('skin/js/canvasbg.js') }}"></script>
<script src="{{ adm_asset('skin/js/utility.js') }}"></script>
<script src="{{ adm_asset('skin/js/pnotify.js') }}"></script>

@stack('scriptfiles')

<script src="{{ adm_asset('skin/js/adm.js') }}"></script>
<script src="{{ adm_asset('skin/js/main.js') }}"></script>
<script src="{{ adm_asset('js/adm.js') }}"></script>

<script>
    
    $(function () {
        "use strict";
        Core.init();
        Adm.init();
    });
    
    function admNotify(style, text) {
	    new PNotify({
		    title: 'System Notification',
		    text: text,
		    shadow: true,
		    type: style,
            width: '25%',
		    delay: 1500
	    });
    }
</script>

@stack('scripts')
@yield('scripts')

</html>
