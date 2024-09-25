<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'first_name' => 'Eslam',
        //     'last_name' => 'Badawy',
        //     'email' => 'admin@gmail.com',
        //     'phone' => '01150099801',
        //     'password' => Hash::make('password'),
        //     'role_name' => 'admin',
        //     'role_id' => 2,
        // ]);
        $this->call(RolesTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(InputsSeeder::class);

    }
}
