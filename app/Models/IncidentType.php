<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IncidentType extends Model
{
    use HasFactory;

    public $fillable = [
        'description',
    ];

    /**
     * Gets the incidents within a given type.
     * @return HasMany 
     */
    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public const RULES = [
        'description' => 'required|string|max:64',
    ];
}
