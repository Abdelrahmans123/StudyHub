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
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quizId')->references('id')->on('quizzes')->onDelete('cascade');
            $table->foreignId('studentId')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('questionId')->references('id')->on('questions')->onDelete('cascade');
            $table->float('score');
            $table->enum('abuse',['0','1'])->default('0');
            $table->date('date');
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
        Schema::dropIfExists('degrees');
    }
};
