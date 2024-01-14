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
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('a1')->nullable();
            $table->integer('a2')->nullable();
            $table->integer('a3')->nullable();
            $table->integer('a4')->nullable();
            $table->integer('a5')->nullable();
            $table->integer('a6')->nullable();
            $table->integer('a7')->nullable();
            $table->integer('a8')->nullable();
            $table->integer('a9')->nullable();
            $table->integer('a10')->nullable();
            $table->integer('a11')->nullable();
            $table->integer('a12')->nullable();
            $table->integer('a13')->nullable();
            $table->integer('a14')->nullable();
            $table->integer('a15')->nullable();
            $table->integer('a16')->nullable();
            $table->integer('a17')->nullable();
            $table->integer('a18')->nullable();
            $table->string('gender')->nullable();
            $table->string('race')->nullable();
            $table->string('sexual_orientation')->nullable();
            $table->string('religion')->nullable();
            $table->text('other_personal_characteristics')->nullable();
            $table->string('language')->nullable();
            $table->string('modality')->nullable();
            $table->string('orientation')->nullable();
            $table->string('number_of_sessions')->nullable();
            $table->string('length_of_sessions')->nullable();
            $table->string('frequency_of_sessions')->nullable();
            $table->string('medication_preference')->nullable();
            $table->string('therapy_addition')->nullable();
            $table->text('strong_preferences')->nullable();
            $table->text('dislikes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
