<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableSchoolAddSocialMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->text('facebook')->nullable()->after('phone2');
            $table->text('instagram')->nullable()->after('facebook');
            $table->text('twitter')->nullable()->after('instagram');
            $table->text('youtube')->nullable()->after('twitter');
        });
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
