<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('occurrence_id')->unsigned();
            $table->integer('local_id')->unsigned();
            $table->double('lat', 9, 6);
            $table->double('lng', 9, 6);
            $table->string('address');
            $table->longText('obs');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('occurrence_id')->references('id')->on('occurrences');
            $table->foreign('local_id')->references('id')->on('locals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
