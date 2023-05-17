<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMathProblemUserTable extends Migration
{
    public function up()
    {
        Schema::create('math_problem_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('math_problem_id');
            $table->boolean('is_submitted')->default(false);
            $table->timestamps();

            $table->primary(['math_problem_id', 'user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('math_problem_id')->references('id')->on('math_problems')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('math_problem_user');
    }
}

