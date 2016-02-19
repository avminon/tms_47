<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('course_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->string('status')->nulllable();
            $table->datetime('end_date')->nulllable();
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
        Schema::drop('user_tasks');
    }
}
