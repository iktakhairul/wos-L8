<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index()->nullable()->unsigned();
            $table->string('business_name')->nullable();
            $table->string('slug')->nullable();
            $table->enum('type',['product','service'])->nullable();
            $table->enum('owner_type',['proprietorship','partnership','private','public'])->nullable();
            $table->string('business_code')->nullable();
            $table->string('business_contact_no')->nullable();
            $table->string('business_email')->nullable();
            $table->integer('division_id')->index()->nullable();
            $table->integer('district_id')->index()->nullable();
            $table->integer('thana_id')->index()->nullable();
            $table->integer('postal_code')->index()->nullable();
            $table->string('address')->nullable();
            $table->double('ranking_score')->nullable()->default(0.0);
            $table->string('status')->nullable()->default(true);
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
        Schema::dropIfExists('businesses');
    }
}
