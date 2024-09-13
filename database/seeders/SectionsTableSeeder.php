<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Dashboards 1 - 2
        Section::updateOrCreate(['id' => 1], ['name' => 'admin_general_dashboard', 'caption' => 'General_Dashboard']);
        Section::updateOrCreate(['id' => 2], ['name' => 'admin_general_dashboard_show', 'section_group_id' => 1, 'caption' => "General_Dashboard_page" ]);

        // Roles 3 - 7
        Section::updateOrCreate(['id' => 3], ['name' => 'Admin_Roles', 'caption' => 'Admin_Roles']);
        Section::updateOrCreate(['id' => 4], ['name' => 'Show_Admin_Roles', 'section_group_id' => 3, 'caption' => 'Show_Admin_Roles']);
        Section::updateOrCreate(['id' => 5], ['name' => 'Create_Admin_Roles', 'section_group_id' => 3, 'caption' => 'Create_Admin_Roles']);
        Section::updateOrCreate(['id' => 6], ['name' => 'Edit_Admin_Roles', 'section_group_id' => 3, 'caption' => 'Edit_Admin_Roles']);
        Section::updateOrCreate(['id' => 7], ['name' => 'Update_Admin_Roles', 'section_group_id' => 3, 'caption' => 'Update_Admin_Roles']);
        Section::updateOrCreate(['id' => 8], ['name' => 'Delete_Admin_Roles', 'section_group_id' => 3, 'caption' => 'Delete_Admin_Roles']);

        // Settings 9 - 11
        Section::updateOrCreate(['id' => 9], ['name' => 'Admin_Settings', 'caption' => 'Admin_Settings']);
        Section::updateOrCreate(['id' => 10], ['name' => 'Show_Admin_Settings', 'section_group_id' => 9, 'caption' => 'Show_Admin_Settings']);
        Section::updateOrCreate(['id' => 11], ['name' => 'Edit_Admin_Settings', 'section_group_id' => 9, 'caption' => 'Edit_Admin_Settings']);

        // Pages 12 - 17
        Section::updateOrCreate(['id'=> 12], ['name'=> 'Admin_Pages', 'caption' => "Admin_Pages"]);
        Section::updateOrCreate(["id"=> 13], ["name"=> "Show_All_Pages", 'caption' => "Show_All_Pages" , 'section_group_id' => 12 ]);
        Section::updateOrCreate(["id"=> 14], ["name"=> "Show_Page", 'caption' => "Show_Page" , 'section_group_id' => 12 ]);
        Section::updateOrCreate(["id"=> 15], ["name"=> "Create_Page", 'caption' => "Create_Page" , 'section_group_id' => 12 ]);
        Section::updateOrCreate(["id"=> 16], ["name"=> "Update_Page", 'caption' => "Update_Page" , 'section_group_id' => 12 ]);
        Section::updateOrCreate(["id"=> 17], ["name"=> "Delete_Page", 'caption' => "Delete_Page" , 'section_group_id' => 12 ]);

        // Categories 18 - 
        Section::updateOrCreate(['id'=> 18], ['name'=> 'Admin_Categories' , 'caption' => 'Admin_Categories',]) ;
        Section::updateOrCreate(["id"=> 19], ["name"=> "Show_All_Categories", 'caption' => "Show_All_Categories" , 'section_group_id' => 18 ]);
        Section::updateOrCreate(["id"=> 20], ["name"=> "Show_Category", 'caption' => "Show_Category" , 'section_group_id' => 18 ]);
        Section::updateOrCreate(["id"=> 21], ["name"=> "Create_Category", 'caption' => "Create_Category" , 'section_group_id' => 18 ]);
        Section::updateOrCreate(["id"=> 22], ["name"=> "Update_Category", 'caption' => "Update_Category" , 'section_group_id' => 18 ]);
        Section::updateOrCreate(["id"=> 23], ["name"=> "Delete_Category", 'caption' => "Delete_Category" , 'section_group_id' => 18 ]);


        /* Run Panel Sections */
        $this->runPanelSections();
    }
    private function runPanelSections()
    {

        // // Organization Instructors 1 - 9
        // $this->createPanelSection(['id' => 1], ['name' => 'panel_organization_instructors', 'caption' => 'Organization Instructors']);
        // $this->createPanelSection(['id' => 2], ['name' => 'panel_organization_instructors_lists', 'section_group_id' => 1, 'caption' => 'Lists']);
        // $this->createPanelSection(['id' => 3], ['name' => 'panel_organization_instructors_create', 'section_group_id' => 1, 'caption' => 'Create']);
        // $this->createPanelSection(['id' => 4], ['name' => 'panel_organization_instructors_edit', 'section_group_id' => 1, 'caption' => 'Edit']);
        // $this->createPanelSection(['id' => 5], ['name' => 'panel_organization_instructors_delete', 'section_group_id' => 1, 'caption' => 'Delete']);


    }

    private function createPanelSection($arr1, $arr2)
    {
        $prefixId = 100000;
        $arr2['type'] = "panel";

        if (!empty($arr2['section_group_id'])) {
            $arr2['section_group_id'] = $prefixId + $arr2['section_group_id'];
        }

        Section::updateOrCreate([
            'id' => $prefixId + $arr1['id'],
        ], $arr2);


    }
}
