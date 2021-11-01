<?php

namespace App\Services;

use App\Constants\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FileService
{
    /**
     * Add new image to model
     */
    public function addImage(Model $model, string $image = 'image', string $collection = Media::DEFAULT)
    {
        //add user profile image if req contain image
        if (request()->hasFile($image) && request()->file($image)->isValid()) {
            $model->addMediaFromRequest($image)
                ->usingFileName(uniqid(date('d-m-Y_') . Str::slug(request()->file($image)->getClientOriginalName())) . '.' . request()->file($image)->getClientOriginalExtension())
                ->toMediaCollection($collection);
        }
    }
}
