<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $gender = $i % 2 === 0 ? 'Male' : 'Female';
            $marital_status = $i % 2 === 0 ? 'married' : 'single';

            User::factory()->create(['gender' => $gender, 'marital_status' => $marital_status]);
        }
    }
}
