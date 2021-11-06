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