<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'duration',
        'fee',
        'image',
        'curriculum',
        'instructor',
        'is_published',
        'study_mode',
        'intake_months',
        'location',
        'cricos_code',
        'core_units',
        'elective_units',
        'career_outcomes',
        'entry_requirements',
        'how_to_apply',
        'international_requirements',
        'fees_payment_info',
        'policies_forms',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'fee' => 'decimal:2',
        'core_units' => 'array',
        'elective_units' => 'array',
        'career_outcomes' => 'array',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
