<div class="form-group{{ $errors->has('service_code') ? ' has-error' : '' }}">
    <label for="service_code" class="col-sm-12 control-label fw500">Service Code<i class="text-danger">*</i></label>
    <div class="col-sm-12">
        <input id="service_code" type="text" class="form-control" name="service_code" value="{{ !empty($editRow->service_code) ? $editRow->service_code : old('service_code') }}" placeholder="0">
        @if ($errors->has('service_code'))
            <span class="help-block">
                <strong>{{ $errors->first('service_code') }}</strong>
            </span>
        @endif
    </div>
</div>
