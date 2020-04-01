<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceForFieldPerHourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_for_field_per_hour', function (Blueprint $table) {
            // Columns
            $table->uuid('stadium_id');
            $table->uuid('field_id');
            $table->unsignedTinyInteger('days_of_week');
            $table->time('slot_start');
            $table->time('slot_end');
            $table->float('price_per_hour');
            $table->timestamps();

            // Primary Keys
            $table->primary([
                'field_id',
                'days_of_week',
                'slot_start',
                'slot_end',
            ], 'price_for_field_per_hour_primary');

            // Foreign Key Constraints
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
        Schema::dropIfExists('price_for_field_per_hour');
    }
}
