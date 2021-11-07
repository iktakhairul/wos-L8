<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <div class="col-12">
        <label for="" class="control-label fw500">Status</label>
    </div>
    <div class="col-12">
        <div class="custom-control custom-switch d-inline-block">
            <input type="checkbox" class="custom-control-input addon" id="status" name="status" {{ !empty($editRow->status) ? 'checked' : '' }}>
            <label class="custom-control-label fw500" for="status">Active</label>
        </div>
        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
</div>