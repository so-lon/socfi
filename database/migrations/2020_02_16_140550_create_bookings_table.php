<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            // Columns
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('stadium_id');
            $table->uuid('field_id');
            $table->datetime('start_datetime');
            $table->unsignedInteger('duration');
            $table->unsignedInteger('is_canceled')->default(0);

            // Foreign Key Constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
