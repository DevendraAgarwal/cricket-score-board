<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('team_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->integer('jersey_number');
            $table->string('profile_img');
            $table->integer('total_matches')->default(0);
            $table->integer('total_runs')->default(0);
            $table->integer('highest_score')->default(0);
            $table->integer('no_of_fifties')->default(0);
            $table->integer('no_of_hundreds')->default(0);
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
        Schema::dropIfExists('players');
    }
}
