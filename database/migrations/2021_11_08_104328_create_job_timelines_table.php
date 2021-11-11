<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_timelines', function (Blueprint $table) {
            $table->id();
            $table->integer('job_post_id')->nullable();
            $table->integer('job_response_id')->nullable();
            $table->integer('job_post_user_id')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('job_timeline');
    }
}
