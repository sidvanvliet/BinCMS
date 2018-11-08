<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visits';

    public static function execute()
    {
        $visit = new Visit;
        $visit->ipaddr = $_SERVER['REMOTE_ADDR'];
        $visit->save();
    }
}
