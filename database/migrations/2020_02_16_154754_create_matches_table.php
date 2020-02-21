<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            // Columns
            $table->uuid('id')->primary();
            $table->uuid('booking_id')->nullable();
            $table->uuid('created_team_id');
            $table->uuid('joined_team_id')->nullable();
            $table->text('content');
            $table->unsignedTinyInteger('status');

            // Foreign Key Constraints
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('created_team_id')->references('id')->on('teams');
            $table->foreign('joined_team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
