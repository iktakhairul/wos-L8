<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('service_category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('thana_id')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('address')->nullable();
            $table->text('map_location')->nullable();
            $table->dateTime('approval_datetime')->nullable();
            $table->dateTime('start_datetime')->nullable();
            $table->dateTime('end_datetime')->nullable();
            $table->integer('required_person')->nullable();
            $table->double('budget', 15, 2)->nullable();
            $table->string('tags')->nullable();
            $table->double('ratings', 5, 2)->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('job_posts');
    }
}
