<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
    $table->id();
     $table->text('cover')->nullable();                  // Detailed, full-length narrative plot summary

    $table->string('title');                                // Movie Title (e.g., Inception)
    $table->text('description')->nullable();               // Short tagline or brief summary
    $table->foreignId('author_id')->constrained('authors'); // Links to the creator/director/author ID
    $table->text('synopsis')->nullable();                  // Detailed, full-length narrative plot summary
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
