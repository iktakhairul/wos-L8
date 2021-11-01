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
            $table->string('email')->unique();
            $table->string('contact_number')->unique();
            $table->string('password');
            $table->boolean('is_fraud')->default(false);
            $table->string('type')->nullable()->default(null);
            $table->string('role')->nullable();
            $table->text('permissions')->nullable();
            $table->double('weight', 4, 2)->nullable();
            $table->json('domains')->nullable();
            $table->string('status')->nullable();
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
