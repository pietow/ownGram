<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            //connect to the users table via reference to user table
            $table->unsignedBigInteger('user_id');
           // $table->string('title')->nullable();
           // $table->text('description')->nullable();
           // $table->string('url')->nullable();
            $table->timestamps();

            //for searchability and quicker queries 
 
 
            //index for any foreign key
            $table->index('user_id');
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
