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
            $table->bigIncrements('id')->unsigned()->index();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contact_number')->unique();
            $table->string('avatar')->nullable();
            $table->string('type')->nullable()->default('user');
            $table->text('domains')->nullable();
            $table->string('role')->nullable()->default('user');
            $table->double('weight')->nullable()->default(9.99);
            $table->text('permissions')->nullable();
            $table->string('status')->nullable()->default('active');
            $table->string('password');
            $table->string('complete_profile_status')->nullable()->default('incomplete');
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
