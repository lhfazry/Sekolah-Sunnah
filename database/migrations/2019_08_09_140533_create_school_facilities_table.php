<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolFacilitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('facility_id')->unsigned();
            $table->biginteger('created_by')->unsigned()->nullable();
            $table->biginteger('updated_by')->unsigned()->nullable();
            $table->biginteger('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('school_facilities');
    }
}
