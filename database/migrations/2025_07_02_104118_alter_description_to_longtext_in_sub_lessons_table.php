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
        Schema::table('sub_lessons', function (Blueprint $table) {
        $table->longText('description')->change();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_lessons', function (Blueprint $table) {
        $table->text('description')->change(); // atau sesuaikan dengan sebelumnya
    });
    }
};
