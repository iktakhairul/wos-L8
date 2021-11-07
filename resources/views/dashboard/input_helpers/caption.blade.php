<div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
    <label for="caption" class="col-sm-12 control-label fw500">Caption</label>
    <div class="col-sm-12">
        <input id="caption" type="text" class="form-control" name="caption" value="{{ !empty($editRow->caption) ? $editRow->caption : old('caption') }}" placeholder="caption">
        @if ($errors->has('caption'))
            <span class="help-block">
                <strong>{{ $errors->first('caption') }}</strong>
            </span>
        @endif
    </div>
</div>