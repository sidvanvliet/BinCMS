<?php

namespace App\Helpers;
use App\Setting;

class SettingHelper
{
    public static function setting($setting)
    {
        return Setting::getSettingValue($setting);
    }
}