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
        Schema::create('therapists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->text('bio')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->json('race')->nullable();
            $table->string('sexual_orientation')->nullable();
            $table->string('religion')->nullable();
            $table->json('language')->nullable();
            $table->json('modality')->nullable();
            $table->json('orientation')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapists');
    }
};
