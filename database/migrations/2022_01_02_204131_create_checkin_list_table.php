<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->integer('mileage');
            $table->date('week_commencing_date');
            $table->string('week_commencing_day','50');
            $table->string('mirrors_and_glass','20');
            $table->string('wipers_washers','20');
            $table->string('front_view','20');
            $table->string('warning_lamps','20');
            $table->string('steering','20');
            $table->string('horn','20');
            $table->string('brakes','20');
            $table->string('height_marker','20');
            $table->string('seatbelts','20');
            $table->string('lights_indicators','20');
            $table->string('fuel_leaks','20');
            $table->string('battery_security_condition','20');
            $table->string('dissel_exhaust_fluid','20');
            $table->string('engine_smoke','20');
            $table->string('body_security','20');
            $table->string('spray_suppression','20');
            $table->string('types_wheel_fixing','20');
            $table->string('brake_line','20');
            $table->string('electrical_connections','20');
            $table->string('coupling_security','20');
            $table->string('security_load','20');
            $table->string('number_plate','20');
            $table->string('reflectors_light','20');
            $table->string('markers','20');
            $table->text('fault');
            $table->string('status','20')->default('checkin');
            
            $table->timestamps();
            $table->foreign('car_id')->references('id')->on('cars');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkin_list');
    }
}
