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
        Schema::table('users', function (Blueprint $table) {
            $table->longText('father_name')->nullable()->after('school');
            $table->longText('mother_name')->nullable();
            $table->bigInteger('father_number')->nullable();
            $table->bigInteger('mother_number')->nullable();
            $table->string('grade')->nullable();
            $table->string('gender')->nullable();
            $table->string('consent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
