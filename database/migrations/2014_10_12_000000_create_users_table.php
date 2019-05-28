<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('id');
            $table->string('user_name')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('public_email')->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('profile_picture')->default(Asset('images/profile_default.png'));
            $table->text('bio')->nullable();
            $table->enum('type', ['user', 'contributer', 'admin', 'banned'])->default('user');
            // Social accounts:
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->string('mastodon')->nullable();
            $table->string('youtube')->nullable();
            $table->string('discord')->nullable();
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
