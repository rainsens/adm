@if(isset($label) && $name)
    <div class="form-group">
        <label for="{{ $name }}" class="col-md-3 control-label {{ $errors->has('url') ? 'has-error' : '' }}">
            @if(isset($required))<span class="text-danger">*</span> @endif {{ $label }}
        </label>
        <div class="col-md-8">
            <select name="{{ $name }}" class="select2-single form-control select2dropdown"></select>
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
        let dropdownData = {!! json_encode($data) !!}
        
        $(function () {
	        let dropdown = $('.select2dropdown');
	        dropdown.select2({
		        placeholder: '{{ isset($placeholder) ? $placeholder : '' }}',
		        allowClear: true,
		        data: dropdownData,
		        escapeMarkup: function(markup) {
			        return markup;
		        },
		        templateResult: function(data) {
			        return data.html;
		        },
		        templateSelection: function(data) {
			        return data.text;
		        }
	        });
        });
    </script>
@endpush
