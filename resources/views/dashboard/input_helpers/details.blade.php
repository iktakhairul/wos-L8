<div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
    <label for="details" class="col-sm-8 control-label fw500">Details</label>
    <div class="col-sm-12">
        <textarea name="details" id="details" cols="1" rows="2" class="form-control">{{ !empty($editRow->details) ? $editRow->details : old('details') }}</textarea>
        @if ($errors->has('details'))
            <span class="help-block">
                <strong>{{ $errors->first('details') }}</strong>
            </span>
        @endif
    </div>
</div>

@push('scripts')

<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace('details');
    $(document).ready(function(){
        //
    });
</script>

@endpush