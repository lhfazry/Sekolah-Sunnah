<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SchoolSlug extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Update slug to all records
        DB::update('UPDATE schools SET slug_sekolah = LOWER(REPLACE(nama_sekolah, " ", "-"))');
    }
}
