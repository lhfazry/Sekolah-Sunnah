<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class S3Helper
{
    public static function getUrl($key) {
        if(!empty($key)) {
            return Storage::disk('s3')->url($key);
        }
        else {
            return "";
        }
    }
}
