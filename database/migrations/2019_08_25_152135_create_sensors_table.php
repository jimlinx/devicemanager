<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('deviceid')->nullable();
            $table->unsignedBigInteger('sensortype')->nullable();
            $table->unsignedBigInteger('locationid')->nullable();
            $table->unsignedBigInteger('pin')->nullable();

            $table->string('channel1', 255)->nullable();
            $table->string('channel2', 255)->nullable();
            $table->integer('association')->nullable();
            $table->integer('status')->nullable();
            $table->string('name', 255)->nullable();
            $table->integer('ondelay')->nullable();
            $table->decimal('offdelay', 4, 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}
