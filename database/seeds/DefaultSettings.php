<?php

use Illuminate\Database\Seeder;

class DefaultSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'setting'   => 'name',
            'value'     => 'My portfolio',
        ]);

        DB::table('settings')->insert([
            'setting'   => 'styling',
            'value'     => '*{   }',
        ]);

        DB::table('settings')->insert([
            'setting'   => 'paginate',
            'value'     => '6',
        ]);
    }
}
