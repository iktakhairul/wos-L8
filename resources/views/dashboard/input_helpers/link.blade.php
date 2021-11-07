<div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
    <label for="link" class="col-sm-12 control-label fw500">Link</label>
    <div class="col-sm-12">
        <input id="link" type="text" class="form-control" name="link" value="{{ !empty($editRow->link) ? $editRow->link : old('link') }}" placeholder="link">
        @if ($errors->has('link'))
            <span class="help-block">
                <strong>{{ $errors->first('link') }}</strong>
            </span>
        @endif
    </div>
</div>