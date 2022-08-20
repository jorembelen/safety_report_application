<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Incident;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory(50)->create();
        Location::factory(5)->create();
        User::factory(15)->create();
        Incident::factory(50)->create();

        User::create([
            'name' => 'Jorem Belen',
            'username' => 'jorem.belen',
            'email' => 'jorembelen@gmail.com',
            'role' => 'super_admin',
            'password' => 'admin@jorem',
        ]);
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => 'pass2022',
        ]);
        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@user.com',
            'role' => 'user',
            'password' => 'pass2022',
        ]);
    }
}
