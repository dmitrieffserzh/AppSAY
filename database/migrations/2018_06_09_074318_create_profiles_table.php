<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('user_id');
	        $table->string('name')->nullable();
	        $table->string('surname')->nullable();
	        $table->integer('sex')->nullable();
	        $table->string('city')->nullable();
	        $table->string('phone')->nullable();
	        $table->string('birthday')->nullable();
	        $table->text('about_user')->nullable();
	        $table->string('avatar')->default('/images/default/default_user.png');
	        $table->timestamp('offline_at')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
