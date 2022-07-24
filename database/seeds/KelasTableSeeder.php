<?php

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelases = collect(['1(SATU)', '5(LIMA)']);
        $kelases->each(function ($c){
            \App\Kelas::create([
                'kelas' => $c,
            ]);
        });
    }
}
