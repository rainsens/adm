@extends('adm::layouts.body')

@section('content')
    
    @component('adm::grid.table', [
        'tools'     => $tools,
        'columns'   => $columns,
        'items'     => $items,
    ])
    @endcomponent

@endsection
