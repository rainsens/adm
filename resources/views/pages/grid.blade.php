@extends('adm::layouts.body')

@section('content')
    
    @component('adm::grid.table', [
        'columns' => $columns,
        'items' => $items
    ])
    @endcomponent

@endsection
