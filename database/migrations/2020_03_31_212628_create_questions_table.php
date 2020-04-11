<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('type_question_id')->constrained()->onDelete('cascade');
            $table->json('question');
            $table->integer('true_answer');
            $table->text('solution');
            $table->foreignId('type_class_id')->constrained()->onDelete('cascade');
            $table->integer('class')->nullable();

            $table->foreignId('topic_id')->constrained()->onDelete('cascade');

            $table->string('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
