<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_responses', function (Blueprint $table) {
            $table->id();
            $table->integer('service_category_id')->nullable();
            $table->integer('job_post_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('description')->nullable();
            $table->double('demanded_budget', 15, 2)->nullable();
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
        Schema::dropIfExists('job_responses');
    }
}
