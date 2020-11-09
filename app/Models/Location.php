<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    public $fillable = [
        'zipcode',
        'latitude',
        'longitude',
        'description',
    ];

    /**
     * Gets the incidents that occurred in a given location.
     * @return HasMany 
     */
    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public const RULES = [
        'zipcode' => ['required', 'regex:/\d{5}-\d{3}/'],
        'latitude' => 'required|numeric|min:-90|max:90',
        'longitude' => 'required|numeric|min:-180|max:180',
        'description' => 'required|string|max:128',
    ];
}
