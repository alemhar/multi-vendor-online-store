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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('user_address1');
            $table->string('user_address2');
            $table->string('user_city');
            $table->string('user_mobile');
            $table->string('user_tel');
            $table->string('user_facebook');
            $table->string('user_twitter');
            $table->string('user_instagram');
            $table->integer('user_rating');
            $table->integer('platform_rating');
            $table->string('platform_rank');
            $table->string('public_id');
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
