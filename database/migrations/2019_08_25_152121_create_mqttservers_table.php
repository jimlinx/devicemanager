<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMqttserversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mqttservers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('ip', 255)->nullable();
            $table->string('port', 5)->nullable();
            $table->string('name', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mqttservers');
    }
}
