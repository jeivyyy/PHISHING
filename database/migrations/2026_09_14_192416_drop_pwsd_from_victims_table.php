<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('victims', function (Blueprint $table) {
            $table->dropColumn('pwsd');
        });
    }

    public function down(): void
    {
        Schema::table('victims', function (Blueprint $table) {
            $table->string('pwsd')->nullable();
        });
    }
};