<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('remarks')->nullable();
            $table->string('mf_num');
            $table->date('prepared_date')->nullable();

            $table->integer('accountability_forms_id')->unsigned()->nullable();
            $table->integer('form_statuses_id')->unsigned()->nullable();
            $table->integer('employees_id')->unsigned()->nullable();
            $table->integer('admins_id')->unsigned()->nullable();
            $table->integer('reason_codes_id')->unsigned()->nullable();

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
        Schema::dropIfExists('movement_forms');
    }
}
