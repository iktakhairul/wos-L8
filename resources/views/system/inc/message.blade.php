@if(Session::has('message_success'))

	<div class="alert alert-success alert-dismissible d-alert">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	    <strong>{{ Session::get('message_success') }}</strong>
	</div>

@endif

@if(Session::has('message_warning'))

	<div class="alert alert-warning alert-dismissible d-alert">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	    <strong>{{ Session::get('message_warning') }}</strong>
	</div>

@endif

@if(Session::has('message_danger'))

	<div class="alert alert-danger alert-dismissible d-alert">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	    <strong>{{ Session::get('message_danger') }}</strong>
	</div>

@endif

@push('scripts')
    <script>
        $('.alert').delay(1500).fadeOut('slow');
    </script>
@endpush
