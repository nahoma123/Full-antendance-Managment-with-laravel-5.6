<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->integer('employee_id');
            $table->boolean("isAvailable");
            $table->datetime('signing_time')->default(\Carbon\Carbon::now());
            $table->datetime('signout_time')->nullable();
            $table->string('absent_reason')->nullable();
        });
    }

    /**
     */
    public function down()
    {
        Schema::drop('attendances');
    }
}