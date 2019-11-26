<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'status' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'spass' => 'admin',
        ]);
    }
}
