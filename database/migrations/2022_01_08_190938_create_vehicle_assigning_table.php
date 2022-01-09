<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleAssigningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_assigning', function (Blueprint $table) {
            $table->id();
            $table->string('user_id','20');
            $table->string('driver_id','20');
            $table->string('vehicle_id','20');
            $table->string('date','100');
            $table->boolean('shift','100');
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
        Schema::dropIfExists('vehicle_assigning');
    }
}
