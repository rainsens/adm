@if(isset($data))
    <ol class="dd-list">
        
        @foreach($data as $datum)
            
            @component('adm::widgets.nestable.nestableitem', ['data' => $data, 'datum' => $datum])@endcomponent
            
        @endforeach
        
    </ol>
@endif
