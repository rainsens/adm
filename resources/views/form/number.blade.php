{{--
----------------------------------------------------------------------------------------
$label: string
$name: string
$class: string
$style: string
$value: mixed

$min: int
$max: int
$step: int
$start: int
----------------------------------------------------------------------------------------
--}}
@if(isset($label) && isset($name))
    <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
        <label for="{{ $name }}" class="col-md-2 control-label">
            @if(isset($required))<span class="text-danger">*</span> @endif {{ $label ?? '' }}
        </label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                <input type="number"
                       min="{{ isset($min) ? $min : 1 }}"
                       max="{{ isset($max) ? $max : 9999 }}"
                       step="{{ isset($step) ? $step : 1 }}"
                       id="{{ $name }}"
                       name="{{ $name }}"
                       class="form-control ui-spinner-input {{ $class ?? '' }}"
                       style="{{ $style ?? '' }}"
                       value="{{ $value ?? 1 }}"
                       @if(isset($required)) required oninvalid="setCustomValidity('请输入{{ $label }}.')" oninput="setCustomValidity('')" @endif>
            </div>
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

@push('foot')
    <script>
        $(function () {
	        $("#{{ $name }}").spinner({
		        min: '{{ isset($min) ? $min : 1 }}',
		        max: '{{ isset($max) ? $max : 9999 }}',
		        step: '{{ isset($step) ? $step : 1 }}',
		        start: '{{ isset($start) ? $start : 1 }}'
	        });
        });
    </script>
@endpush
