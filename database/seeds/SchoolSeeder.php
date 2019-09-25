<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        // insert data ke table 
        for($i = 1; $i <= 50; $i++){
            DB::table('schools')->insert([
                'level_id' => $faker->numberBetween(1,13),
                'city_id' => $faker->numberBetween(3171,3175),
                'nama_sekolah' => $faker->stateAbbr.' '.$faker->firstNameMale.' '.$faker->word,
                'slug_sekolah' => strtolower($faker->stateAbbr.'-'.$faker->firstNameMale.'-'.$faker->word),
                'biaya_pendaftaran' => $faker->numberBetween(5000000,10000000),
                'biaya_spp' => $faker->numberBetween(250000,500000),
                'yayasan' => 'Yayasan '.$faker->streetName,
                'address' => $faker->address,
                'lat' => $faker->latitude($min = -90, $max = 90),
                'lng' => $faker->longitude($min = 100, $max = 180),
                'map' => 'https://goo.gl/'.$faker->slug,
                'email' => $faker->email,
                'website' => $faker->domainName,
                'phone1' => $faker->phoneNumber,
                'phone2' => $faker->tollFreePhoneNumber,
                'facebook' => 'https://fb.com/'.$faker->word,
                'instagram' => 'https://fb.com/'.$faker->word,
                'twitter' => 'https://fb.com/'.$faker->word,
                'youtube' => 'https://fb.com/'.$faker->word,
                'contact_person' => $faker->name,
                'hp' => $faker->e164PhoneNumber,
                'short_description' => $faker->text($maxNbChars = 100),
                'description' => $faker->text($maxNbChars = 300),
                // baris setelah ini dikomen ketika menjalankan kedua kali agar sebagian ada yang sudah unverified. 
                // hasilnya nanti 50 unverified dan 50 verified
                'verified_at' => $faker->dateTimeThisCentury($max = 'now', $timezone = null)

                // gunakan perintah ini untuk menjalankan
                // php artisan db:seed --class SchoolSeeder
            ]);
        }
    }
}
