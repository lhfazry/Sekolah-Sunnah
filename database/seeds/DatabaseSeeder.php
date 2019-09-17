<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Level;
use App\Models\Facility;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $user = new \App\User;
        $user->name = 'Admin';
        $user->email = 'admin@sekolahsunnah.com';
        $user->password = Hash::make("ERtL9QxrekFhK2u7");
        $user->save();

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Contributor']);

        $user->assignRole('Admin');

        Level::create(['name' => 'Day Care']);
        Level::create(['name' => 'PAUD']);
        Level::create(['name' => 'TK']);
        Level::create(['name' => 'Madrasah Ibtidaiyah (MI)']);
        Level::create(['name' => 'Madrasah Tsnawiyah (MTs)']);
        Level::create(['name' => 'Madrasah Aliyah (MA)']);
        Level::create(['name' => 'SD']);
        Level::create(['name' => 'SMP']);
        Level::create(['name' => 'SMA']);
        Level::create(['name' => 'SMK']);
        Level::create(['name' => 'Perguruan Tinggi']);
        Level::create(['name' => 'Pesantren']);
        Level::create(['name' => 'Pelatihan / Kursus']);

        Facility::create(['name' => 'Akhwat', 'description' => 'Tersedia kelas Akhwat', 'icon' => 'fa-female']);
        Facility::create(['name' => 'Ikhwan', 'description' => 'Tersedia kelas Ikhwan', 'icon' => 'fa-male']);
        Facility::create(['name' => 'Full Day', 'description' => 'Menyelenggarakan kelas Full Day', 'icon' => 'fa-cloud-sun']);
        Facility::create(['name' => 'Boarding', 'description' => 'Menyelenggarakan kelas Boarding', 'icon' => 'fa-building']);

        Level::where('name', 'Day Care')->first()->update(['name' => 'DC', 'sequence' => 1, 'description' => 'Pendidikan Anak Usia Dini', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'PAUD')->first()->update(['sequence' => 2, 'description' => 'Pendidikan Anak Usia Dini', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'TK')->first()->update(['sequence' => 3, 'description' => 'Taman Kanak-Kanak', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'Madrasah Ibtidaiyah (MI)')->first()->update(['name' => 'MI', 'sequence' => 4, 'description' => 'Madrasah Ibtidaiyah', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'Madrasah Tsnawiyah (MTs)')->first()->update(['name' => 'MTs', 'sequence' => 5, 'description' => 'Madrasah Tsnawiyah', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'Madrasah Aliyah (MA)')->first()->update(['name' => 'MA', 'sequence' => 6, 'description' => 'Madrasah Aliyah', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'SD')->first()->update(['sequence' => 7, 'description' => 'Sekolah Dasar', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'SMP')->first()->update(['sequence' => 8, 'description' => 'Sekolah Menengah Pertama', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'SMA')->first()->update(['sequence' => 9, 'description' => 'Sekolah Menengah Atas', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'SMK')->first()->update(['sequence' => 10, 'description' => 'Sekolah Menengah Kejuruan', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'Perguruan Tinggi')->first()->update(['name' => 'PT', 'sequence' => 11, 'description' => 'Perguruan Tinggi', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'Pesantren')->first()->update(['sequence' => 12, 'description' => 'Pondok Pesantren', 'icon' => 'fa-graduation-cap']);
        Level::where('name', 'Pelatihan / Kursus')->first()->update(['name' => 'Kursus', 'sequence' => 13, 'description' => 'Lembaga Kursus', 'icon' => 'fa-graduation-cap']);
    }
}
