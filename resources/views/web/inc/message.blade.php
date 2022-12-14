@if (Session::has('message_success'))
	<div class="container">
		<div class="alert alert-success alert-dismissible text-center">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    <strong>{{ Session::get('message_success') }}</strong>
		</div>
	</div>
@elseif (Session::has('message_warning'))
	<div class="container">
		<div class="alert alert-danger alert-dismissible text-center">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    <strong>{{ Session::get('message_warning') }}</strong>
		    @if (Session::has('id'))
	            <a href="{{ url('admin/force-delete-'.Session::get('name').'/') }}/{{ Session::get('id') }}" class="btn btn-xs btn-warning">Yes</a>
	            <a href="#" class="btn btn-xs btn-primary" data-dismiss="alert" aria-label="close">No</a>
	        @endif
		</div>
	</div>
@elseif (Session::has('message'))
	<div class="container">
		<div class="alert alert-info alert-dismissible text-center">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    <strong>{{ Session::get('message') }}</strong>
		</div>
	</div>
@endif

{{--@if ($errors->any())--}}
{{--    <div class="container">--}}
{{--        <div class="alert alert-danger alert-dismissible text-center">--}}
{{--            <button type="button" class="close" data-dismiss="alert">&times;</button>--}}
{{--            <strong>{!! implode('', $errors->all('<div>:message</div>')) !!}</strong>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}

@push('scripts')
    <script>
        /**
         * Dismiss alert
         */
        $(".alert-dismissible").fadeTo(3000, 1000).slideUp(1000, function() {
            $(".alert-dismissible").slideUp(1000);
        });
    </script>
@endpush
