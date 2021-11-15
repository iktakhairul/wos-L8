<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('job_timeline_id')->nullable();
            $table->integer('job_post_id')->nullable();
            $table->integer('job_post_user_id')->nullable();
            $table->integer('job_worker_user_id')->nullable();
            $table->string('type')->nullable(); // 'job_owner' or 'job_worker'
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('ratings');
    }
}
