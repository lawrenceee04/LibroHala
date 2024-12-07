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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('accession_number');
            $table->string('title');
            $table->string('edition');
            $table->string('author');
            $table->string('publisher');
            $table->string('isbn');
            $table->string('class');
            $table->double('topic_area');
            $table->string('cutter_number');
            $table->string('publication_year');
            $table->string('copies')->nullable();
            $table->string('status');
            $table->string('genre');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
