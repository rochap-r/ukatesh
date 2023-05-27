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
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('name');
            $table->text('description');
            $table->string('visionTitle');
            $table->string('missionTitle');
            $table->text('missionContent');
            $table->string('memberTitle');
            $table->text('memberContent');
            $table->text('visionContent');
            $table->string('tel');
            $table->string('email');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranks');
    }
};
