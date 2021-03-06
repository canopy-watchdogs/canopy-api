<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\Rule;

class Incident extends Model
{
    use HasFactory;

    public $fillable = [
        'location_id',
        'incident_type_id',
        'occurrence_time',
        'severity',
        'description',
    ];

    /**
     * Gets the type to which the incident belongs.
     * @return BelongsTo 
     */
    public function incidentType()
    {
        return $this->belongsTo(IncidentType::class);
    }

    /**
     * Gets the location where the incident occurred.
     * @return BelongsTo 
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public const SEVERITY_LEVELS = [
        'least_concern',
        'imminent_threat',
        'acute',
        'critical',
        'catastrophe',
    ];

    public static function getRules()
    {
        return [
            'location_id' => [
                'required',
                'integer',
                'exists:' . Location::class . ',id',
            ],
            'incident_type_id' => [
                'required',
                'integer',
                'exists:' . IncidentType::class . ',id',
            ],
            'occurrence_time' => 'required|date',
            'severity' => [
                'required',
                Rule::in(self::SEVERITY_LEVELS),
            ],
            'description' => 'string',
        ];
    }
}
