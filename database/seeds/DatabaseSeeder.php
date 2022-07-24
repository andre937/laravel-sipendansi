<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PelajaransTableSeeder::class);
        $this->call(NilaisTableSeeder::class);
    }
}
