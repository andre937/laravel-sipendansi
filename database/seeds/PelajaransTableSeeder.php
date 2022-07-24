<?php

use Illuminate\Database\Seeder;

class PelajaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelajarans = collect(['Pend. Agama', 'PPKN', 'Matematika', 'Bhs. Indonesia', 'PJOK', 'IPA', 'IPS', 'Bhs. Jawa', 'SBDP']);
        $pelajarans->each(function ($c){
            \App\Pelajaran::create([
                'pelajaran' => $c,
                'slug' => \Str::slug($c),
            ]);
        });
    }
}
