<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Users
        Schema::table('users',function(Blueprint $table){
            $table->foreign('roles_id')
                ->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('departments_id')
                ->references('id')->on('departments')->onDelete('cascade');
        });

        // Equipment
        Schema::table('equipment',function(Blueprint $table){
            $table->foreign('equipment_types_id')
                ->references('id')->on('equipment_types')->onDelete('cascade');
            $table->foreign('equipment_statuses_id')
                ->references('id')->on('equipment_statuses')->onDelete('cascade');
        });

        // Brands
        Schema::table('brands',function(Blueprint $table){
            $table->foreign('equipment_types_id')
                ->references('id')->on('equipment_types')->onDelete('cascade');
        });

        // Request
        Schema::table('request_forms',function(Blueprint $table){
            $table->foreign('equipment_id')
                ->references('id')->on('equipment')->onDelete('cascade');
            $table->foreign('users_id')
                ->references('id')->on('users')->onDelete('cascade');
        });

        // Accountability Form
        Schema::table('accountability_forms',function(Blueprint $table){
            $table->foreign('request_forms_id')
                ->references('id')->on('request_forms')->onDelete('cascade');
            $table->foreign('equipment_id')
                ->references('id')->on('equipment')->onDelete('cascade');
            $table->foreign('departments_id')
                    ->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('employees_id')
                    ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admins_id')
                    ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('form_statuses_id')
                    ->references('id')->on('form_statuses')->onDelete('cascade');
        });

        // Movement Form
        // Schema::table('accountability_forms',function(Blueprint $table){
        //     $table->foreign('request_forms_id')
        //         ->references('id')->on('request_forms')->onDelete('cascade');
        //     $table->foreign('equipment_id')
        //         ->references('id')->on('equipment')->onDelete('cascade');
        //     $table->foreign('departments_id')
        //             ->references('id')->on('departments')->onDelete('cascade');
        //     $table->foreign('employees_id')
        //             ->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('admins_id')
        //             ->references('id')->on('users')->onDelete('cascade');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
