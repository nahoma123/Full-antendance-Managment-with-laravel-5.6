<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('id')->primary()->unique();
            $table->Integer('shift_id')->unsigned();
            $table->Integer('job_id')->unsigned();
            $table->string("name",50);
            $table->boolean('gender')->default(0);
            $table->boolean("isRetired")->default(0);
            $table->datetime('sign_in_time');
            $table->datetime('sign_out_time');
            $table->datetime('hired_at');
            $table->datetime('retired_at')->nullable();
            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('employees');
    }
}
