<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="col-sm-12 control-label fw500">Title<i class="text-danger">*</i></label>
    <div class="col-sm-12">
        <input id="title" type="text" class="form-control" name="title" value="{{ !empty($editRow->title) ? $editRow->title : old('title') }}" autofocus="true" placeholder="Title" required="true">
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>