<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('users')->truncate();
        \DB::table('users')->insert([
            [
                'email'     => 'admin@admin.com',
                'password'  => \Hash::make('12345678'),
                'role'      => 'admin',
                'avatar'    => 'https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=100'
            ],
            [
                'email'     => 'arsitek1@arsitek.com',
                'password'  => \Hash::make('12345678'),
                'role'      => 'arsitek',
                'status'    => 'terverifikasi',
                'avatar'    => 'https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=100'
            ]
        ]);
    }
}
