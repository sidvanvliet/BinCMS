<?php

namespace App\Helpers;
use App\Setting;

class SettingHelper
{
    public static function setting($setting)
    {
        return Setting::getSettingValue($setting);
    }
    public static function buildcol()
    {
        $value = self::setting("layout");
        return "col-" . (12/$value);
    }
}