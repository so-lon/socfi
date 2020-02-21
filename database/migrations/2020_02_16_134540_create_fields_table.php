<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            // Columns
            $table->uuid('id')->primary();
            $table->uuid('stadium_id');
            $table->string('name', 50);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->unsignedTinyInteger('type');
            $table->unsignedTinyInteger('condition')->default(0);
            $table->uuid('created_by');
            $table->uuid('updated_by');
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
