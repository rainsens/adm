@inject('nestableSvc', 'App\Services\NestableSvc')

@if(isset($data) && isset($datum))
    
    @if($children = $nestableSvc->children($data, $datum->id))
        
        {{-- If has children, keep searching. --}}
        
        <li class="dd-item" data-id="{{ $datum->id }}">
        
            <div class="dd-handle">
                
                <i class="fa {{ $datum->icon }}"></i> {{ $datum->name }}
                
                
            </div>
            
            <div style="position: absolute; top: 8px; right: 10px; z-index: 1">
                <a href="{{ isset($nestableSvc::$params['urlDelete']) ? route($nestableSvc::$params['urlDelete'], $datum->id) : '' }}" class="pull-right">
                    <span class="fa fa-trash"></span>
                </a>
                <a href="{{ isset($nestableSvc::$params['urlDelete']) ? route($nestableSvc::$params['urlEdit'], $datum->id) : '' }}" class="pull-right" style="margin: 1px 3px 0 0">
                    <span class="fa fa-edit"></span>
                </a>
            </div>
            
            @component('widget.nestablerow', ['data' => $children])@endcomponent
        
        </li>
        
    @elseif(!in_array($datum->id, $nestableSvc::$settled))
        
        {{-- If it does not have children, stop and show it. --}}
        
        <li class="dd-item position-relative" data-id="{{ $datum->id }}">
            
            <div class="dd-handle">
                
                <i class="fa {{ $datum->icon }}"></i> {{ $datum->name }}
                
            </div>
            
            <div style="position: absolute; top: 8px; right: 10px; z-index: 1">
                <a href="{{ isset($nestableSvc::$params['urlDelete']) ? route($nestableSvc::$params['urlDelete'], $datum->id) : '' }}" class="pull-right">
                    <span class="fa fa-trash"></span>
                </a>
                <a href="{{ isset($nestableSvc::$params['urlEdit']) ? route($nestableSvc::$params['urlEdit'], $datum->id) : '' }}" class="pull-right" style="margin: 1px 3px 0 0">
                    <span class="fa fa-edit"></span>
                </a>
            </div>
            
        </li>
        
        @php $nestableSvc::$settled[] = $datum->id @endphp
        
    @endif
    
@endif
