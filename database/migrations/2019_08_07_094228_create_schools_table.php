<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_sekolah');
            $table->string('jenjang')->nullable();
            $table->boolean('ikhwan')->nullable();
            $table->boolean('akhowat')->nullable();
            $table->boolean('boarding')->nullable();
            $table->boolean('full_day')->nullable();
            $table->biginteger('biaya_pendaftaran')->unsigned()->nullable();
            $table->biginteger('biaya_spp')->unsigned()->nullable();
            $table->string('yayasan')->nullable();
            $table->text('address')->nullable();
            $table->decimal('lat', 11, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('map')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->text('logo')->nullable();
            $table->text('photo1')->nullable();
            $table->text('photo2')->nullable();
            $table->text('photo3')->nullable();
            $table->text('photo4')->nullable();
            $table->text('video_profil')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->biginteger('created_by')->unsigned()->nullable();
            $table->biginteger('updated_by')->unsigned()->nullable();
            $table->biginteger('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('schools');
    }
}
