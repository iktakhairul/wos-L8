@extends('web.index')
@section('title', 'Profile - ' .Auth::user()->name)

@push('styles')

@endpush

@section('web_content')

<div class="container-fluid mt-5 mb-5 pt-5 pb-5">
    <div class="row">
        <div class="container text-center">
            <p class="font-150">
                This should be the profile page
            </p>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        //        
    });
</script>

@endpush