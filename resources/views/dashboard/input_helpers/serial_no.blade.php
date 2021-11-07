<div class="form-group{{ $errors->has('serial_no') ? ' has-error' : '' }}">
    <label for="serial_no" class="col-sm-12 control-label fw500">Serial No</label>
    <div class="col-sm-12">
        <input id="serial_no" type="number" class="form-control" name="serial_no" value="{{ !empty($editRow->serial_no) ? $editRow->serial_no : old('serial_no') }}" placeholder="0">
        @if ($errors->has('serial_no'))
            <span class="help-block">
                <strong>{{ $errors->first('serial_no') }}</strong>
            </span>
        @endif
    </div>
</div>