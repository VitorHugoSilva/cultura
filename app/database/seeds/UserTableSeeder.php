<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create(['email' => 'sistema@cultura.com', 'password' => 'teste']);
    }
}