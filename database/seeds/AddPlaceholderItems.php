<?php

use Illuminate\Database\Seeder;

class AddPlaceholderItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<3;$i++)
        {
            $titles = array('Lorem ipsum', 'Random Post', 'My item', 'Spoon, tea.');
            $descriptions = array(
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.',
            );

            DB::table('portfolio')->insert([
                'item_name'         => $titles[mt_rand(0, count($titles) - 1)],
                'item_description'  => $descriptions[mt_rand(0, count($descriptions) - 1)],
            ]);
        }
    }
}
