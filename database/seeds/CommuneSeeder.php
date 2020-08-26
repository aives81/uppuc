<?php

use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<10; $i++){
            DB::table('communes')->insert([
                'libCom' => Str::random(10)
            ]);
        }
    }
}
