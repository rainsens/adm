@inject('nestable', 'Rainsens\Adm\Widgets\Nestable\Nestable')

@if(isset($data) && isset($datum))
    
    @if($children = $nestable->children($data, $datum->id))
        
        {{-- If has children, keep searching. --}}
        
        <li class="dd-item" data-id="{{ $datum->id }}">
        
            <div class="dd-handle">
                
                <i class="fa {{ $datum->icon }}"></i> {{ $datum->name }}
                
            </div>
            
            <div style="position: absolute; top: 8px; right: 10px; z-index: 1">
                <a href="{{ isset($nestable::$params['urlDelete']) ? route($nestable::$params['urlDelete'], $datum->id) : '' }}" class="pull-right">
                    <span class="fa fa-trash"></span>
                </a>
                <a href="{{ isset($nestable::$params['urlDelete']) ? route($nestable::$params['urlEdit'], $datum->id) : '' }}" class="pull-right" style="margin: 1px 3px 0 0">
                    <span class="fa fa-edit"></span>
                </a>
            </div>
            
            @component('adm::widgets.nestable.nestablerow', ['data' => $children])@endcomponent
        
        </li>
        
    @elseif(!in_array($datum->id, $nestable::$settled))
        
        {{-- If it does not have children, stop and show it. --}}
        
        <li class="dd-item position-relative" data-id="{{ $datum->id }}">
            
            <div class="dd-handle">
                
                <i class="fa {{ $datum->icon }}"></i> {{ $datum->name }}
                
            </div>
            
            <div style="position: absolute; top: 8px; right: 10px; z-index: 1">
                <a href="{{ isset($nestable::$params['urlDelete']) ? route($nestable::$params['urlDelete'], $datum->id) : '' }}" class="pull-right">
                    <span class="fa fa-trash"></span>
                </a>
                <a href="{{ isset($nestable::$params['urlEdit']) ? route($nestable::$params['urlEdit'], $datum->id) : '' }}" class="pull-right" style="margin: 1px 3px 0 0">
                    <span class="fa fa-edit"></span>
                </a>
            </div>
            
        </li>
        
        @php $nestable::$settled[] = $datum->id @endphp
        
    @endif
    
@endif
