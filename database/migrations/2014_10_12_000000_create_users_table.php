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
            $table->id();
            $table->string('avatar')->nullable('');
            $table->string('name');
            $table->string('username')->default('avater');
            $table->string('email' , 100)->unique();
            $table->string('phone');
            $table->enum('role', ['User', 'Admin'])->default('User');
            $table->string('status')->default("Pending");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('last_login')->nullable();
            $table->string('password');
            $table->rememberToken();
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
