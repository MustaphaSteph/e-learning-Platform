<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('role_id')->unsigned()->index();
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('picture')->nullable(); // profile picture
            $table->char('gender',1); // male or female
            $table->rememberToken();
            $table->timestamps();

           /*
            $table->integer('score')->unsigned();
            $table->integer('view')->unsigned();
            $table->boolean('confirmed')->default(0); // for mail activation
            $table->boolean('banned')->default(0); // banned users
            $table->boolean('active')->default(1); // active users by admin
            $table->boolean('status')->default(1); // 0 delete - 1 active
            */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
