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
        Schema::create('online_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('meetingId');
            $table->string('topic');
            $table->dateTime('startAt');
            $table->integer('duration')->comment('minutes');
            $table->string('password')->comment('meeting password');
            $table->text('startURL');
            $table->text('joinURL');
            $table->foreignId('instructorId')->references('id')->on('instructors')->onDelete('cascade');
            $table->foreignId('courseId')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('online_sessions');
    }
};
