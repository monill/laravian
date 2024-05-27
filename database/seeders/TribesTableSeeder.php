<?php

namespace Database\Seeders;

use App\Models\Tribe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TribesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tribes = [
            ['name' => 'Romans', 'slug' => 'romans', 'is_avaliable' => 1],
            ['name' => 'Teutons', 'slug' => 'teutons', 'is_avaliable' => 1],
            ['name' => 'Gauls', 'slug' => 'gauls', 'is_avaliable' => 1],
            ['name' => 'Nature', 'slug' => 'nature'],
            ['name' => 'Natars', 'slug' => 'natars'],
        ];

        foreach ($tribes as $tribe) {
            Tribe::create($tribe);
        }
    }
}
