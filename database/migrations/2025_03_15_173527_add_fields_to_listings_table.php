<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Force Laravel to recognize these columns as new
        Schema::table('listings', function (Blueprint $table) {
            if (!Schema::hasColumn('listings', 'bedrooms')) {
                $table->unsignedTinyInteger('bedrooms')->after('id');
            }
            if (!Schema::hasColumn('listings', 'bathrooms')) {
                $table->unsignedTinyInteger('bathrooms')->after('bedrooms');
            }
            if (!Schema::hasColumn('listings', 'area')) {
                $table->unsignedInteger('area')->after('bathrooms');
            }
            if (!Schema::hasColumn('listings', 'city')) {
                $table->string('city', 100)->after('area');
            }
            if (!Schema::hasColumn('listings', 'postal_code')) {
                $table->string('postal_code', 20)->after('city');
            }
            if (!Schema::hasColumn('listings', 'street')) {
                $table->string('street', 255)->after('postal_code');
            }
            if (!Schema::hasColumn('listings', 'house_number')) {
                $table->string('house_number', 20)->after('street');
            }
            if (!Schema::hasColumn('listings', 'price')) {
                $table->unsignedInteger('price')->after('house_number');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn([
                'bedrooms',
                'bathrooms',
                'area',
                'city',
                'postal_code',
                'street',
                'house_number',
                'price',
            ]);
        });
    }
};