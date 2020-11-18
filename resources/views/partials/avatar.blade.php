@if(auth()->user()->avatar)
    <img src="{{ auth()->user()->avatar }}" class="{{ (isset($class) && $class) ? $class : '' }}" alt>
@else
    <img src="{{ asset('vendor/adm/skin/img/avatars/3.jpg') }}" class="{{ (isset($class) && $class) ? $class : '' }}" alt>
@endif
