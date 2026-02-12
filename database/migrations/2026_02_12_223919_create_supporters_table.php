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
        Schema::create('supporters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_person_name');
            $table->string('contact_person_email')->nullable();
            $table->string('contact_person_phone');
            $table->string('url')->nullable();
            $table->longText('description');
            $table->string('supporter_logo_path');
            $table->string('supporter_banner_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supporters');
    }
};
