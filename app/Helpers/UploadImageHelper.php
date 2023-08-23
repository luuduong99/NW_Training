<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class UploadImageHelper
{
    public static function uploadImage($request, $name, $folder)
    {
        $file = $request->file($name);
        $ext = strtolower($file->getClientOriginalExtension());
        $image = rand() . '.' . $ext;
        Storage::putFileAs('public/'. $folder , $file, $image);

        return $image;
    }
    public static function deleteImage($attribute, $folder)
    {
        if (
            isset($attribute->avatar) && file_exists('storage/' . $folder . '/' . $attribute->avatar) &&
            $attribute->avatar != ""
        ) {
            unlink('storage/' . $folder . '/' . $attribute->avatar);
        }
    }
}
