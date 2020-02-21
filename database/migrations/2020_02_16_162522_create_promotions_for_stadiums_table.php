<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsForStadiumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions_for_stadiums', function (Blueprint $table) {
            // Columns
            $table->uuid('promotion_id');
            $table->uuid('stadium_id');

            // Primary Keys
            $table->primary(['promotion_id', 'stadium_id']);

            // Foreign Key Constraints
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('promotions_for_stadiums');
    }
}
