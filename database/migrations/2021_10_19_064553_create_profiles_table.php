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
            $table->string('full_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('spouse_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender', 6)->nullable();
            $table->string('religion', 10)->nullable();
            $table->bigInteger('present_division_id')->nullable()->index();
            $table->bigInteger('present_district_id')->nullable()->index();
            $table->bigInteger('present_thana_id')->nullable()->index();
            $table->integer('present_postal_code')->nullable();
            $table->string('present_address')->nullable();
            $table->bigInteger('permanent_division_id')->nullable()->index();
            $table->bigInteger('permanent_district_id')->nullable()->index();
            $table->bigInteger('permanent_thana_id')->nullable()->index();
            $table->bigInteger('permanent_postal_code')->nullable();
            $table->string('permanent_address')->nullable();
            $table->double('profile_score', 2, 2)->nullable();
            $table->string('referral_code')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
