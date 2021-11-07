<!-- ./row -->
<hr class="heading-devider">
<div class="row">
    <div class="col-sm-12 text-center text-success">
        <strong>Meta Information</strong>
    </div>
    <div class="col-sm-12">
        <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
            <label for="meta_keywords" class="col-sm-12 control-label fw500">Meta Keywords <small class="text-info">(keywords should be lowercase)</small></label>
            <div class="col-sm-12">
                <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" value="{{ !empty($editRow->meta_keywords) ? $editRow->meta_keywords : old('meta_keywords') }}">
                @if ($errors->has('meta_keywords'))
                    <span class="help-block">
                        <strong>{{ $errors->first('meta_keywords') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
            <label for="meta_description" class="col-sm-12 control-label fw500">Meta Description</label>
            <div class="col-sm-12">
                <textarea name="meta_description" id="meta_description" class="form-control" cols="1" rows="2">{{ $editRow && $editRow->meta_description ? $editRow->meta_description : old('meta_description') }}</textarea>
                @if ($errors->has('meta_description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('meta_description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- row -->