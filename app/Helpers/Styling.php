<?php

namespace App\Helpers;
use App\Media;
use Illuminate\Support\Facades\DB;

class Styling
{
    public static function loadCustomCSS()
    {
        $styling = DB::table('settings')->where('setting', 'styling')->first();
        return $styling->value;
    }
}