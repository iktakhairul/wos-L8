<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->index()->unsigned();
            $table->integer('business_id')->nullable()->index()->unsigned();
            $table->enum('type',['online','offline','combined'])->nullable();
            $table->string('shop_contact_numbers')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_email')->nullable();
            $table->integer('division_id')->index()->nullable();
            $table->integer('district_id')->index()->nullable();
            $table->integer('thana_id')->index()->nullable();
            $table->integer('postal_code')->index()->nullable();
            $table->string('address')->nullable();
            $table->string('shop_code')->nullable();
            $table->text('map_location')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
