<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name', 255)->nullable();

            $table->unsignedBigInteger('siteid')->nullable();
            $table->unsignedBigInteger('locationid')->nullable();
            $table->unsignedBigInteger('masterid')->nullable();
            $table->unsignedBigInteger('status')->nullable();
            $table->unsignedBigInteger('devicetypeid')->nullable();

            $table->string('serial', 50)->nullable();
            $table->integer('mqttserver')->nullable();
            $table->string('mqttuser', 45)->nullable();
            $table->string('mqttpass', 45)->nullable();
            $table->string('picture', 45)->nullable();
            $table->integer('alarmtime')->nullable();
            $table->string('memo', 100)->nullable();
            $table->string('ip', 45)->nullable();
            $table->dateTime('logontime')->nullable();
            $table->string('hostname', 45)->nullable();
            $table->dateTime('registertime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
