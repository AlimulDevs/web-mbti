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
        Schema::create('school_recom_students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("school_id")->nullable()->index();
            $table->bigInteger("student_id")->nullable()->index();
            $table->decimal("value", 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_recom_students');
    }
};
