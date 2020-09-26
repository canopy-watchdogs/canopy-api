<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentType extends Model
{
    use HasFactory;

    public const RULES = [
        'description' => 'required|string|max:64',
    ];

    public $fillable = [
        'description',
    ];
}
