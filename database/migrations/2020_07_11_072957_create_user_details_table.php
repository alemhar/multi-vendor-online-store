<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('user_address1')->nullable();
            $table->string('user_address2')->nullable();
            $table->string('user_city')->nullable();
            $table->string('user_mobile')->nullable();
            $table->string('user_tel')->nullable();
            $table->string('user_facebook')->nullable();
            $table->string('user_twitter')->nullable();
            $table->string('user_instagram')->nullable();
            $table->integer('user_rating')->default(0);
            $table->integer('platform_rating')->default(0);
            $table->string('platform_rank')->nullable();
            $table->string('public_id')->nullable();
            $table->string('user_type')->default('free');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('user_details');
    }
}
