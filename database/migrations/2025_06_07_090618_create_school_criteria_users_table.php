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
        Schema::create('school_criteria_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("school_id")->nullable()->index();
            $table->bigInteger("user_id")->nullable()->index();
            $table->bigInteger("school_criteria_id")->nullable()->index();
            $table->bigInteger("criteria_user_id")->nullable()->index();
            $table->integer('value')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_criteria_users');
    }
};
