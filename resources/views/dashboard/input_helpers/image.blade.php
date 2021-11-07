<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="image" class="col-sm-12 control-label fw500">Image <small class="text-info">(Product Preferred Shape: SQUARE)</small></label>

    <div class="col-sm-12">
        <small class="fw500">Accept: <span class="text-danger">jpg, jpeg, png, gif</span></small>
    </div>

    @if(!empty($editRow->image))
    <div class="col-sm-12 mb-2">
        <small class="text-danger fw500">NB: New image will delete the old image automatically.</small>
    </div>
    @endif
    <div class="col-sm-8">
        
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" onchange="readURL(this);" accept=".jpg, .jpeg, .png, .gif">
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
        </div>
        
        <img id="image_preview" src="" alt="" class="col-sm-12 img-fluid mt-3">
        
        <script>
            function readURL(input)
            {
                if (input.files && input.files[0])
                {
                    var reader = new FileReader();
                    reader.onload = function (e)
                    {
                        $('#image_preview')
                        .attr('src', e.target.result)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
</div>