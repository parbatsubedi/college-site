<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('study_mode')->nullable()->after('duration'); // e.g., "On Campus / Online"
            $table->string('intake_months')->nullable()->after('study_mode'); // e.g., "January, May, September"
            $table->string('location')->nullable()->after('intake_months'); // e.g., "Sydney, Melbourne"
            $table->string('cricos_code')->nullable()->after('location'); // e.g., "03456J"
            $table->json('core_units')->nullable()->after('curriculum'); // JSON array of core units
            $table->json('elective_units')->nullable()->after('core_units'); // JSON array of elective units
            $table->json('career_outcomes')->nullable()->after('elective_units'); // JSON array of job roles
            $table->text('entry_requirements')->nullable()->after('career_outcomes'); // Entry requirements text
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'study_mode',
                'intake_months',
                'location',
                'cricos_code',
                'core_units',
                'elective_units',
                'career_outcomes',
                'entry_requirements',
            ]);
        });
    }
};
