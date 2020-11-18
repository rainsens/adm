@extends('adm::layouts.adm')

@section('main-content')
    
    @component('adm::partials.skin')@endcomponent
    
    <div id="main">
        
        @component('adm::partials.header')@endcomponent
        @component('adm::partials.sidebar')@endcomponent
        
        <section id="content_wrapper">
            
            @component('adm::partials.topbarmenu')@endcomponent
            @component('adm::partials.breadcrumb')@endcomponent
            
            
            <section id="content" class="animated fadeIn">
                @yield('content')
            </section>
            
            
            @component('adm::partials.footer')@endcomponent
        
        </section>
        
        @component('adm::partials.rightsidebar')@endcomponent
    
    </div>
@stop
