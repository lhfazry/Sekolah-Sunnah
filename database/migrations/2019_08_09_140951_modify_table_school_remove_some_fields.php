<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableSchoolRemoveSomeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn('jenjang');
            $table->dropColumn('ikhwan');
            $table->dropColumn('akhowat');
            $table->dropColumn('boarding');
            $table->dropColumn('full_day');
            $table->integer('level_id')->unsigned()->nullable()->after('id');
            $table->integer('city_id')->unsigned()->nullable()->after('level_id');
            $table->text('brochure')->nullable()->after('video_profil');
            $table->timestamp('verified_at')->unsigned()->nullable()->after('description');

            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
