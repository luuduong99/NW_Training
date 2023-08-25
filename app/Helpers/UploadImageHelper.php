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
        Storage::disk('public')->putFileAs($folder, $file, $image);

        return $image;
    }

    public static function deleteImage($attribute, $folder)
    {
        if (
            isset($attribute->avatar) && Storage::disk('public')->exists($folder . '/' . $attribute->avatar) &&
            $attribute->avatar != ""
        ) {
            Storage::disk('public')->delete($folder . '/' . $attribute->avatar);
        }
    }
}
