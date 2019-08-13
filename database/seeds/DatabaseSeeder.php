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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $user = new \App\User;
        $user->name = 'Admin';
        $user->email = 'admin@sekolahsunnah.com';
        $user->password = Hash::make("ERtL9QxrekFhK2u7");
        $user->save();

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Contributor']);

        $user->assignRole('Admin');

        Level::create(['name' => 'PAUD']);
        Level::create(['name' => 'TK']);
        Level::create(['name' => 'SD']);
        Level::create(['name' => 'SMP']);
        Level::create(['name' => 'SMA']);
        Level::create(['name' => 'SMK']);
        Level::create(['name' => 'Pesantren']);
        Level::create(['name' => 'Perguruan Tinggi']);

        Facility::create(['name' => 'Akhwat', 'description' => 'Tersedia kelas Akhwat', 'icon' => 'fa-female']);
        Facility::create(['name' => 'Ikhwan', 'description' => 'Tersedia kelas Ikhwan', 'icon' => 'fa-male']);
        Facility::create(['name' => 'Full Day', 'description' => 'Menyelenggarakan kelas Full Day', 'icon' => 'fa-cloud-sun']);
        Facility::create(['name' => 'Boarding', 'description' => 'Menyelenggarakan kelas Boarding', 'icon' => 'fa-building']);
    }
}
