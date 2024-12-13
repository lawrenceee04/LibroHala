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
        Schema::create('borrowing_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("patron_id")->constrained('patrons')->onDelete('cascade');
            $table->foreignId("book_id")->constrained('books')->onDelete('cascade');
            $table->timestamp("borrow_date");
            $table->timestamp("due_date");
            $table->timestamp("return_date")->nullable();
            $table->string("status");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowing_transactions');
    }
};
