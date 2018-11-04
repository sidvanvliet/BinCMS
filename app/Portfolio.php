<?php

namespace App;

use App\Helpers\SettingHelper;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    public static function listItem($itemid)
    {
        $item = Portfolio::where([
            'id' => $itemid,
            'deleted_at' => null
        ])->first();

        Portfolio::where([
            'id' => $itemid,
            'deleted_at' => null
        ])->update(
            ['item_views' => ($item->item_views + 1)]
        );

        return $item;
    }

    public static function adminListItems()
    {
        $items = Portfolio::whereNull('deleted_at');

        $items = Portfolio::whereNull('deleted_at')->get();

        return $items;
    }

    public static function listItems()
    {
        $items = Portfolio::whereNull('deleted_at');

        $items = Portfolio::where('item_is_public', '=', '1')->whereNull('deleted_at')->paginate(SettingHelper::setting('paginate'));

        foreach($items as $item)
        {
            $db_item = Portfolio::where('id', $item->id);
            $newcount = $db_item->get()[0]->homepage_views + 1;

            $db_item->update(
                ['homepage_views' => $newcount]
            );
        }

        return $items;
    }
}
