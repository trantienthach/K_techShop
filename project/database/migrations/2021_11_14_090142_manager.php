<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('password');
            $table->string('user_avatar');
            $table->string('user_is_active');
            $table->integer('user_is_disable');
            $table->integer('user_numPassword_attempts');
            $table->integer('user_time_login');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('role');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('managers');
        Schema::table('managers', function (Blueprint $table) {
            $table->dropColumn('user_avatar');
        });

    }
}
