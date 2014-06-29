<?php

class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => 'ts@daxiangroup.com', 'password' => Hash::make('wh4t3v3r'), 'name' => 'Ruler'));
    }
}