<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_board', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('team_id')->unique();
            $table->integer('points')->default(0);
            $table->integer('total_matches')->default(0);
            $table->integer('win')->default(0);
            $table->integer('loss')->default(0);
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
        Schema::dropIfExists('score_board');
    }
}
