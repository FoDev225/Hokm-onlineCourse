<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('full_text')->nullable();
            $table->integer('position')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('lessons', function($table) {    
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
