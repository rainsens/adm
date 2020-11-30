@extends('adm::layouts.main')

@section('body')
    @component('adm::partials.breadcrumb', ['title' => $title ?? ''])@endcomponent
    <section id="content" class="table-layout animated fadeIn">
        <div class="row">
            @yield('content')
        </div>
    </section>

@stop
