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
        //
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->integer('age');
            $table->float('sleep_duration');
            $table->integer('physical_activity_level');
            $table->integer('heart_rate');
            $table->integer('daily_steps');
            $table->integer('sistolik');
            $table->integer('diastolik');
            $table->string('gender');
            $table->string('occupation');
            $table->string('bmi_category');
            $table->integer('quality_of_sleep');
            $table->integer('stress_level');
            $table->string('sleep_disorder')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
