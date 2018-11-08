<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Visit;

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
        Visit::execute();
        return view('home')->with('items', Portfolio::listItems(true, true));
    }

    public function item($itemid)
    {
        $item = Portfolio::listItem($itemid);

        if(count($item) < 0)
        {
            return redirect('/');
        }

        return view('item')->with('item', $item);
    }
}
