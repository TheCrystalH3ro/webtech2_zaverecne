<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnswerToMathProblemUser extends Migration
{
    public function up()
    {
        Schema::table('math_problem_user', function (Blueprint $table) {
            $table->string('answer')->nullable();
        });
    }

    public function down()
    {
        Schema::table('math_problem_user', function (Blueprint $table) {
            $table->dropColumn('answer');
        });
    }
}

