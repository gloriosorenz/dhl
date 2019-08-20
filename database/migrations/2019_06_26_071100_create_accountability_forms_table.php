<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountabilityFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountability_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('af_num')->unique()->nullable();
            $table->string('designation')->nullable();
            $table->date('issued_date');
            
            $table->integer('form_statuses_id')->unsigned()->nullable();
            $table->integer('departments_id')->unsigned()->nullable();
            $table->integer('equipment_id')->unsigned()->nullable();
            $table->integer('employees_id')->unsigned()->nullable();
            $table->integer('admins_id')->unsigned()->nullable();

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
        Schema::dropIfExists('accountability_forms');
    }
}
