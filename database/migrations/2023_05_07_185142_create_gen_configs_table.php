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
        Schema::create('gen_configs', function (Blueprint $table) {
            $table->id();

            $table->string('sitename')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('adress')->nullable();
            $table->string('favicon48')->nullable();
            $table->string('favicon16')->nullable();
            $table->string('appleicon18')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gen_configs');
    }
};
