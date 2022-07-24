<?php

use Illuminate\Database\Seeder;

class NilaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nilais = collect(['3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '3.9', '3.10']);
        $nilais->each(function ($c){
            \App\Nilai::create([
                'kd' => $c,
            ]);
        });
    }
}
