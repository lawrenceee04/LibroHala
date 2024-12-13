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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('patron_id', 50);
            $table->date('check_in_date');
            $table->time('check_in_time');
            $table->date('check_out_date')->nullable(); // Allow null values
            $table->time('check_out_time')->nullable(); // Allow null values
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patron_id')->references('patron_id')->on('patrons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
