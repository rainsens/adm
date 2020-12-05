@foreach(['light', 'dark', 'primary', 'success', 'info', 'warning', 'danger', 'alert', 'system'] as $message)
    @if(session()->has($message))
        @push('foot')
            <script>
			    $(function () {
				
				    let noteStyle = '{{ $message }}';
				    let noteShadow = true;
				    let width = "290px";
				
				    new PNotify({
					    title: '系统通知',
					    text: '{{ session()->get($message) }}',
					    shadow: noteShadow,
					    type: noteStyle,
					    width: width,
					    delay: 1400
				    });
			    });
            </script>
        @endpush

    @endif
@endforeach
