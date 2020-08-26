<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<5; $i++){
            DB::table('categories')->insert([
                'libCat' => Str::random(10),
                'sulgCat' => str::slug(Str::random(10))
            ]);
        }
    }
}
