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
        Schema::create('sub_lessons', function (Blueprint $table) {
        $table->id();
        $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->text('description');
        $table->text('table_data')->nullable();
        $table->string('image_path')->nullable();
        $table->integer('order');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_lessons');
    }
};
