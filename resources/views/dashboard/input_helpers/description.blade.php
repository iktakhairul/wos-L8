<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

    <div class="col-sm-12">
        <textarea name="description" id="description" cols="1" rows="2" class="form-control">{{ !empty($editRow->description) ? $editRow->description : old('description') }}</textarea>
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>

@push('scripts')

<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace('description');
    $(document).ready(function(){
        //
    });
</script>

@endpush
