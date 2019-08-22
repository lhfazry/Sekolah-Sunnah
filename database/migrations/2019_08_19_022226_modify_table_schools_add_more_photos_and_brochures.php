<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableSchoolsAddMorePhotosAndBrochures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->text('photo5')->nullable()->after('photo4');
            $table->text('photo6')->nullable()->after('photo5');
            $table->text('photo7')->nullable()->after('photo6');
            $table->text('photo8')->nullable()->after('photo7');

            $table->text('brochure1')->nullable()->after('brochure');
            $table->text('brochure2')->nullable()->after('brochure1');
            $table->text('brochure3')->nullable()->after('brochure2');
            $table->text('brochure4')->nullable()->after('brochure3');
            $table->text('brochure5')->nullable()->after('brochure4');
            $table->text('brochure6')->nullable()->after('brochure5');
            $table->text('brochure7')->nullable()->after('brochure6');
            $table->text('brochure8')->nullable()->after('brochure7');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn('photo5');
            $table->dropColumn('photo6');
            $table->dropColumn('photo7');
            $table->dropColumn('photo8');

            $table->dropColumn('brochure1');
            $table->dropColumn('brochure2');
            $table->dropColumn('brochure3');
            $table->dropColumn('brochure4');
            $table->dropColumn('brochure5');
            $table->dropColumn('brochure6');
            $table->dropColumn('brochure7');
            $table->dropColumn('brochure8');
        });
    }
}
