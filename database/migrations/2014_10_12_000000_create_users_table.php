<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username', 20)->unique()->nullable();
            $table->string('name', 50)->unique()->nullable();
            $table->string('email', 32)->unique()->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone', 16)->unique()->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('role', 1);
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
