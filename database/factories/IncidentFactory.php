<?php

namespace Database\Factories;

use App\Models\Incident;
use App\Models\IncidentType;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Incident::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'location_id' => $this->faker->randomElement(Location::all()->pluck('id')),
            'incident_type_id' => $this->faker->randomElement(IncidentType::all()->pluck('id')),
            'occurrence_time' => $this->faker->dateTimeThisDecade(),
            'severity' => $this->faker->randomElement(Incident::SEVERITY_LEVELS),
            'description' => $this->faker->sentence(mt_rand(0, 15)),
        ];
    }
}