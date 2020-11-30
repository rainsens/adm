@if(adm_auth()->user()->avatar)
    <img src="{{ adm_auth()->user()->avatar }}" class="{{ (isset($class) && $class) ? $class : '' }}" alt>
@else
    <img src="{{ adm_asset('skin/img/avatars/3.jpg') }}" class="{{ (isset($class) && $class) ? $class : '' }}" alt>
@endif
