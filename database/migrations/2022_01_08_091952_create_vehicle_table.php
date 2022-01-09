<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('user_id','20');
            $table->string('reg_no','255');
            $table->string('vehicle_name','100');
            $table->string('vehicle_model','20');
            $table->boolean('is_leased','20')->default(0);
            $table->string('leased_company_name','100')->nullable()->change();
            $table->string('vehicle_color','20');
            $table->string('vehicle_brand','50');
            $table->string('vehicle_image','255');
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
        Schema::dropIfExists('vehicle');
    }
}
