<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-sm-12 control-label fw500">Name<i class="text-danger">*</i></label>
    <div class="col-sm-12">
        <input id="name" type="text" class="form-control" name="name" value="{{ !empty($editRow->name) ? $editRow->name : old('name') }}" autofocus="true" placeholder="Name" required="true">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>