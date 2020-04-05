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
            $table->uuid('user_id')->nullable();
            $table->string('name', 50)->nullable();
            $table->uuid('field_id');
            $table->float('price');
            $table->datetime('start_datetime');
            $table->unsignedInteger('duration');
            $table->unsignedInteger('state')->default(0);
            $table->softDeletes();
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('user_id')->references('id')->on('users');
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
