<?php

namespace Database\Seeders;

use App\Models\IncidentType;
use Illuminate\Database\Seeder;

class IncidentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidentType::factory()->createMany([
            ['description' => 'Poluição atmosférica'],
            ['description' => 'Tráfego veicular'],
            ['description' => 'Alagamento/inundação'],
            ['description' => 'Invasão de manancial'],
            ['description' => 'Desmatamento'],
            ['description' => 'Inversão térmica'],
            ['description' => 'Poluição sonora'],
        ]);
    }
}
