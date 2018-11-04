<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    public static function getSettingValue($setting)
    {
        $toget = Setting::where('setting', $setting)->get();
        return $toget[0]->value;
    }
}
