<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait RegistersImages
{
    public function avatar($image, $size)
    {
        if (!is_null($image))
        {
            $file = $image;
            $extension = $image->getClientOriginalExtension();
            $file_name = date('YmdHis') . random_int(1000, 9999) . '.' . $extension;
            $destination_path = public_path('images/avatars/');

            $full_path = $destination_path . $file_name;

            if (!file_exists($destination_path)) {
                File::makeDirectory($destination_path, 0775);
            }

            $image = Image::make($file)->fit($size, null, function ($constraint) {
                $constraint->upsize();
            });

            $image->save($full_path, 100);

            return $file_name;
        } else {
            return 'default.png';
        }
    }
}