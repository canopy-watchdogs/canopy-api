<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IncidentTypesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        # Must be the last one!
        $this->call(IncidentsTableSeeder::class);
    }
}
