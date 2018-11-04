<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;

class ApiController extends Controller
{
    public function image($id)
    {
        $image = Media::item($id);
        return $image;
    }
}