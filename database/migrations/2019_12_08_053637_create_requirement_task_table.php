<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_task', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('requirement_id');
            $table->unsignedBigInteger('task_id');
            $table->timestamps();
            $table->foreign('requirement_id')
                ->references('id')->on('requirements')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('task_id')
                ->references('id')->on('tasks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement_task');
    }
}
