<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStadiumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stadiums', function (Blueprint $table) {
            // Columns
            $table->uuid('id')->primary();
            $table->string('name', 50);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->unsignedTinyInteger('status')->default(0);
            $table->uuid('owned_by');
            $table->uuid('created_by');
            $table->uuid('updated_by');
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stadiums');
    }
}
