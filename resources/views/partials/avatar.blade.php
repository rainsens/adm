@if(Auth::user()->avatar)
    <img src="{{ Storage::url(Auth::user()->avatar) }}" class="{{ (isset($class) && $class) ? $class : '' }}" alt>
@else
    <img src="{{ asset('theme/assets/img/logos/logo_dandelion_bg_white.png') }}" class="{{ (isset($class) && $class) ? $class : '' }}" alt>
@endif
