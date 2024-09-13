<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Dashboards 1 - 49
        \App\Models\Permission::updateOrCreate(['id' => 1], ['role_id' => 2, 'section_id' => 1, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 2], ['role_id' => 2, 'section_id' => 2, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 3], ['role_id' => 2, 'section_id' => 3, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 4], ['role_id' => 2, 'section_id' => 4, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 5], ['role_id' => 2, 'section_id' => 5, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 6], ['role_id' => 2, 'section_id' => 6, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 7], ['role_id' => 2, 'section_id' => 7, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 8], ['role_id' => 2, 'section_id' => 8, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 9], ['role_id' => 2, 'section_id' => 9, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 10], ['role_id' => 2, 'section_id' => 10, 'allow' => 1]);
        \App\Models\Permission::updateOrCreate(['id' => 11], ['role_id' => 2, 'section_id' => 11, 'allow' => 1]);
        // \App\Models\Permission::updateOrCreate(['id' => 12], ['role_id' => 2, 'section_id' => 12, 'allow' => 1]);
        // \App\Models\Permission::updateOrCreate(['id' => 13], ['role_id' => 2, 'section_id' => 13, 'allow' => 1]);
        // \App\Models\Permission::updateOrCreate(['id' => 14], ['role_id' => 2, 'section_id' => 14, 'allow' => 1]);
        // \App\Models\Permission::updateOrCreate(['id' => 15], ['role_id' => 2, 'section_id' => 15, 'allow' => 1]);
        // \App\Models\Permission::updateOrCreate(['id' => 16], ['role_id' => 2, 'section_id' => 16, 'allow' => 1]);
        // \App\Models\Permission::updateOrCreate(['id' => 17], ['role_id' => 2, 'section_id' => 17, 'allow' => 1]);
        // \App\Models\Permission::updateOrCreate(['id' => 18], ['role_id' => 2, 'section_id' => 18, 'allow' => 1]);
        // \App\Models\Permission::updateOrCreate(['id' => 19], ['role_id' => 2, 'section_id' => 19, 'allow' => 1]);
        // \App\Models\Permission::updateOrCreate(['id' => 20], ['role_id' => 2, 'section_id' => 20, 'allow' => 1]);

    }
}
