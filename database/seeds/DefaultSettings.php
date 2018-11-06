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

        DB::table('settings')->insert([
            'setting'   => 'bgcolour',
            'value'     => '#f8fafc',
        ]);

        DB::table('settings')->insert([
            'setting'   => 'subtitle',
            'value'     => 'Welcome to my portfolio!',
        ]);

        DB::table('settings')->insert([
            'setting'   => 'admin_shortcuts',
            'value'     => '1',
        ]);

        // SEO settings

        DB::table('settings')->insert([
            'setting'   => 'seo_keywords',
            'value'     => '',
        ]);

        DB::table('settings')->insert([
            'setting'   => 'seo_language',
            'value'     => 'en',
        ]);

        DB::table('settings')->insert([
            'setting'   => 'seo_description',
            'value'     => 'Welcome to my portfolio',
        ]);
    }
}
