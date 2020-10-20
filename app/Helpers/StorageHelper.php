<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StorageHelper
{
    public static function storeDo($space_config, $folder_name, $asset_data, $asset_path)
    {
        return Storage::disk($space_config)->putFileAs($folder_name, $asset_data, $asset_path);
    }

    public static function getDo($space_config, $asset_path)
    {
        return base64_encode(Storage::disk($space_config)->get($asset_path));
    }
}
