@extends('adm::layouts.body')

@section('content')

    {{ $title }}<br>
    {{ $description }}<br>
    
    @foreach($items as $item)
        {{ $item->name }}<br>
    @endforeach

@endsection
