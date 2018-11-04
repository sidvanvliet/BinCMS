<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with('items', Portfolio::listItems(true));
    }

    public function item($itemid)
    {
        $item = Portfolio::where([
            'id' => $itemid,
            'deleted_at' => null
        ])->get();

        if(count($item) < 0)
        {
            return redirect('/');
        }

        return view('item')->with('item', $item[0]);
    }
}
