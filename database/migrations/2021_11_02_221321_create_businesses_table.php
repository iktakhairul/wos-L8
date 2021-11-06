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
            $table->string('business_logo')->nullable();
            $table->enum('business_type',['shop','service'])->nullable();
            $table->enum('owner_type',['proprietorship','partnership','private','public'])->nullable();
            $table->string('business_code')->nullable();
            $table->double('ranking_score',5,2)->nullable()->default(0.0);
            $table->string('status')->nullable()->default('active');
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
