@extends('adm::layouts.body')

@section('content')
    
    {{ $exceptions->message }}<br>
    {{ $exceptions->code }}<br>
    {{ $exceptions->line }}<br>
    {{ $exceptions->file }}<br>

@endsection
