<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            // Columns
            $table->uuid('id')->primary();
            $table->uuid('code');
            $table->time('usable_from');
            $table->time('usable_to');
            $table->float('promotion_value');
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
        Schema::dropIfExists('promotions');
    }
}
