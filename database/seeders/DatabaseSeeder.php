<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // UserSeeder::class,
            // FamiliesSeeder::class,
            // AttendanceSeeder::class,
            DepartmentSeeder::class,
            // ExpenditureSeeder::class,
            // OfferingSeeder::class,
            RoleSeeder::class,
            // TitheSeeder::class,
            // SeedSeeder::class,
            // VisitorSeeder::class
        ]);
    }
}
