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
            $table->bigIncrements('id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('full_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('profileImage')->nullable();
            $table->date('dob')->nullable();
            $table->string('birthCertificate')->nullable();
            $table->string('gender', 6)->nullable();
            $table->string('religion', 10)->nullable();
            $table->integer('present_postal_code')->nullable();
            $table->string('present_latitude')->nullable();//
            $table->string('present_longitude')->nullable();//
            $table->string('present_city')->nullable();//
            $table->string('present_country')->nullable();//
            $table->string('present_address')->nullable();//
            $table->double('profile_score', 2, 2)->nullable();
            $table->string('referral_code')->nullable();
            $table->string('tags')->nullable();
            $table->double('ratings', 5, 2)->nullable();
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
