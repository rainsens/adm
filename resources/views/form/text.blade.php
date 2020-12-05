@if(isset($label) && isset($name))
    
    <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
        
        <label for="{{ $name }}" class="col-md-2 control-label">
            
            @if(isset($required))<span class="text-danger">*</span> @endif {{ $label }}
            
        </label>
        
        <div class="col-md-9">
            
            <input type="text"
                   id="{{ $name }}"
                   name="{{ $name }}"
                   value="@if(isset($default)){{ $default }}@elseif(old($name)){{ old($name) }}@elseif(isset($value)){{ $value }}@endif"
                   class="form-control"
                   placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
                   @if(isset($required)) required oninvalid="setCustomValidity('请输入{{ $label }}.')" oninput="setCustomValidity('')" @endif>
            
            @if($errors->has($name))
                <span class="append-icon right"><i class="fa fa-remove"></i></span>
                <span class="help-block mt5"><i class="fa fa-remove"></i> {{ $errors->first($name) }}</span>
            @endif
            
            @if(isset($help))
                <span class="help-block mt5">
                    <i class="fa fa-info-circle"></i> {!! $help !!}
                </span>
            @endif
            
        </div>
        
    </div>
    
@endif
