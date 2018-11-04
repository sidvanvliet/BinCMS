<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    public static function listItems($add_views = false)
    {
        $items = Portfolio::where('item_is_public', '=', '1')->whereNull('deleted_at')->get();

        if($add_views == true)
        {
            foreach($items as $item)
            {
                $db_item = Portfolio::where('id', $item->id);
                $newcount = $db_item->get()[0]->homepage_views + 1;

                $db_item->update(
                    ['homepage_views' => $newcount]
                );
            }
        }

        return $items;
    }
}
