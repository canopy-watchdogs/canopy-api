<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IncidentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'incident_type' => [
                'id' => $this->incidentType->id,
                'description' => $this->incidentType->description,
            ],
            'location' => [
                'id' => $this->location->id,
                'latitude' => $this->location->latitude,
                'longitude' => $this->location->longitude,
                'description' => $this->location->description,
            ],
            'severity' => $this->severity,
            'occurrence_time' => $this->occurrence_time,
            'description' => $this->description,
        ];
    }
}
