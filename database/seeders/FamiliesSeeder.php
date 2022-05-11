<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Family;

class FamiliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $families = [
            'Hope',
            'Love',
            'Faith',
            'Peace',
            'Joy'
        ];

        foreach ($families as $family) {
            Family::factory()->create(['name' => $family]);
        }
    }
}
