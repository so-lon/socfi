<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            // Columns
            $table->uuid('id')->primary();
            $table->string('name', 50);
            $table->unsignedTinyInteger('ban_flag')->default(0);
            $table->uuid('created_by');
            $table->uuid('updated_by');
            $table->softDeletes(0);
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
        Schema::dropIfExists('teams');
    }
}
