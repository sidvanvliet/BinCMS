<?php

namespace App\Helpers;
use App\Media;
use Illuminate\Support\Facades\DB;

class Image
{
    public static function getImage($imageid)
    {

        $thumbnail = DB::table('media')->whereNull('deleted_at')->where('item_id', $imageid)->first();

        if(count($thumbnail) > 0)
        {
            return '/content/' . $thumbnail->filename;
        }

        return false;
    }
}