<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'no_induk' => '55201170011',
            'username' => 'Andrea Wijaya Kusuma',
            'role' => 'Admin',
            'password' => bcrypt('55201170011'),
            'remember_token' => str::random(60),
        ]);
    }
}
