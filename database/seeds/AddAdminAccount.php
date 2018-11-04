<?php

use Illuminate\Database\Seeder;

class AddAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'admin',
            'email'         => 'admin@google.com',
            'password'      => bcrypt('admin'),
            'user_is_admin' => 1,
        ]);
    }
}
