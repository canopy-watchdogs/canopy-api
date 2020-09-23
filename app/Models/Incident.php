<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    public const SEVERITY_LEVELS = [
        'least_concern',
        'immininent_threat',
        'acute',
        'critical',
        'catastrophe',
    ];
}
