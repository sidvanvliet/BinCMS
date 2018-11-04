<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    public static function item($id)
    {
        $image = Media::findOrFail($id)->whereNull('deleted_at')->first();
        return $image->filename;
    }
}
