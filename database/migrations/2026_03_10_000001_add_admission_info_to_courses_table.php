<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $columns = DB::getSchemaBuilder()->getColumnListing('courses');

        if (! in_array('how_to_apply', $columns)) {
            Schema::table('courses', function (Blueprint $table) {
                $table->text('how_to_apply')->nullable()->after('fee');
            });
        }

        if (! in_array('international_requirements', $columns)) {
            Schema::table('courses', function (Blueprint $table) {
                $table->text('international_requirements')->nullable()->after('entry_requirements');
            });
        }

        if (! in_array('fees_payment_info', $columns)) {
            Schema::table('courses', function (Blueprint $table) {
                $table->text('fees_payment_info')->nullable();
            });
        }

        if (! in_array('policies_forms', $columns)) {
            Schema::table('courses', function (Blueprint $table) {
                $table->text('policies_forms')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'how_to_apply',
                'international_requirements',
                'fees_payment_info',
                'policies_forms',
            ]);
        });
    }
};
