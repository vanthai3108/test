<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('username', 255)->unique();
            $table->string('password', 255);
            $table->string('full_name', 255);
            $table->string('phone_number', 25);
            $table->string('email', 255)->unique();
            $table->string('avatar_image', 255)->nullable();
            $table->tinyInteger('check_vip')->default(0);
            $table->tinyInteger('permission')->default(0);
//            $table->timestamp('email_verified_at')->nullable();
//            $table->rememberToken();
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
};
