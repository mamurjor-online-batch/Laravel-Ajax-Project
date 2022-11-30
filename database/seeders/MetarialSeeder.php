<?php

namespace Database\Seeders;

use App\Models\Metarial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetarialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Metarial::insert([
            ['name'=>'Wood'],
            ['name'=>'Water'],
            ['name'=>'Plastic']
        ]);
    }
}
