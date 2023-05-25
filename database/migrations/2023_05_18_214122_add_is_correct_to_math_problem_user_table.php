<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsCorrectToMathProblemUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('math_problem_user', function (Blueprint $table) {
            $table->boolean('is_correct')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('math_problem_user', function (Blueprint $table) {
            $table->dropColumn('is_correct');
        });
    }
}
