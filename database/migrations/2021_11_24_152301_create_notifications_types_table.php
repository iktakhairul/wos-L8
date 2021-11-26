<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->integer('createdBy')->nullable();
            $table->timestamps();
        });

        $now = date('Y-m-d H:i:s');
        DB::table('notifications_types')->insert([
            [
                'id'          => 1,
                'type'        => 'Found New Job',
                'description' => 'Found a new job post near you.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

            [
                'id'          => 2,
                'type'        => 'Found New Job',
                'description' => '40+ Jobs are posted near you.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

            [
                'id'          => 3,
                'type'        => 'Job Post',
                'description' => 'You have a newly created job post.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

            [
                'id'          => 4,
                'type'        => 'New Proposal',
                'description' => 'Mr. Tom submitted a proposal to your job.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

            [
                'id'          => 5,
                'type'        => 'Confirmed Proposal',
                'description' => 'Mr. Jerry confirmed your job proposal. Check in my works.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

            [
                'id'          => 6,
                'type'        => 'Work Inquiry',
                'description' => 'Mr. Tom start working, Please check My Job Timeline.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

            [
                'id'          => 7,
                'type'        => 'Work Inquiry',
                'description' => 'Mr. Tom done his work, Waiting for your confirmation.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

            [
                'id'          => 8,
                'type'        => 'Payment',
                'description' => 'Mr. Jerry claimed payment confirmed, Please check and Confirm Payment.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

            [
                'id'          => 9,
                'type'        => 'Ratings',
                'description' => 'Ratings updated.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

            [
                'id'          => 10,
                'type'        => 'Complete',
                'description' => 'You successfully complete job process.',
                'created_at'  => $now,
                'updated_at'  => $now
            ],

        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications_types');
    }
}
