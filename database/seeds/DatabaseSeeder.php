<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperUserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(PermissionSeeder::class);
        
        $this->call(GovernmentSeeder::class);
        $this->call(CourtDegreeSeeder::class);
        $this->call(CourtSpecialistSeeder::class);

    }
}
