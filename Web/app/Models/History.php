<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';

    protected $fillable = [
        'age',
        'sleep_duration',
        'physical_activity_level',
        'heart_rate',
        'daily_steps',
        'sistolik',
        'diastolik',
        'gender',
        'occupation',
        'bmi_category',
        'quality_of_sleep',
        'stress_level',
        'sleep_disorder',
        'created_at',
        'updated_at',
    ];
}
