<a href="{{ route('adm.logout') }}"
   class="{{ (isset($class) && $class) ? $class : '' }}"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    {{ $slot }}
</a>
<form id="logout-form" action="{{ route('adm.logout') }}" method="POST" class="hidden">
    @method('DELETE')
    @csrf
</form>
