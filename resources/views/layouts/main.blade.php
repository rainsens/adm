@extends('adm::layouts.adm')

@section('main-content')
    
    @component('adm::partials.skin')@endcomponent
    
    <div id="main">
        
        @component('adm::partials.header')@endcomponent
        @component('adm::partials.sidebar')@endcomponent
        
        <section id="content_wrapper">
            
            @component('adm::partials.topbarmenu')@endcomponent
            @yield('content')
            @component('adm::partials.footer')@endcomponent
            
        </section>
        
        @component('adm::partials.rightsidebar')@endcomponent
    
    </div>
@stop
