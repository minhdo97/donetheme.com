<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
//            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
//            $table->string('organization')->nullable();
//            $table->string('phone')->nullable();
//            $table->string('address')->nullable();
//            $table->string('state')->nullable();
//            $table->string('zip_code')->nullable();
//            $table->string('country')->nullable();
//            $table->string('language')->default('en');
//            $table->string('timezone')->default('UTC');
//            $table->string('currency')->default('USD');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('admin_users');
    }
}
