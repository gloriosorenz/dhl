<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('it_tag')->nullable();
            $table->string('asset_tag')->nullable();
            // $table->string('brand')->nullable();
            $table->string('specifications')->nullable();
            $table->string('serial_number')->nullable();
            $table->double('unit_cost')->nullable();
            $table->date('date_purchased')->nullable();
            $table->date('date_issued')->nullable();
            $table->integer('quantity')->nullable();

            $table->string('plan')->nullable();
            $table->string('calls')->nullable();
            $table->string('text')->nullable();
            $table->string('local_calls')->nullable();
            $table->string('local_text')->nullable();
            $table->string('consumable')->nullable();
            $table->string('ndd')->nullable();
            $table->string('idd')->nullable();
            $table->string('data')->nullable();
            $table->string('roaming')->nullable();

            $table->integer('brands_id')->unsigned()->nullable();
            $table->integer('equipment_types_id')->unsigned()->nullable();


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
        Schema::dropIfExists('equipment');
    }
}
