<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensortypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensortypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('sensorname', 255)->nullable();
            $table->string('sensortype', 45)->nullable();
            $table->string('msgon', 32)->nullable();
            $table->string('msgoff', 32)->nullable();
            $table->string('displayon', 255)->nullable();
            $table->string('displayoff', 255)->nullable();
            $table->integer('output')->nullable();
            $table->string('displayname', 45)->nullable();
            $table->string('picture', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensortypes');
    }
}
