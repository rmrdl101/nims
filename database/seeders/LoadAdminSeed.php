<?php

namespace Database\Seeders;

use App\Models\Dashboard\Admin\Department;
use App\Models\Dashboard\Admin\Position;
use App\Models\Dashboard\Admin\Page;
use App\Models\Dashboard\Admin\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoadAdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add default admin account
        $user = new User;
        $user->username = 'admin';
        $user->email = 'lagosr.csmc@gmail.com';
        $user->password = Hash::make('admin1@2#3');
        $user->save();

        //Add basic CRUD permissions
        $permissions = ['Create', 'Read', 'Update', 'Delete'];
        foreach($permissions as $itemA){
            $permission = new Permission();

            $permission->name = $itemA;
            $permission->slug = strtolower(str_replace(" ","-",$itemA));
            $permission->save();
        }

        //Add premade pages
        $pages = ['Permissions', 'Pages', 'Positions', 'Departments', 'Users', 'Document Manager'];
        foreach ($pages as $pageItem) {
            $page = new Page();
            $page->name = $pageItem;
            $page->slug = strtolower(str_replace(" ", "-", $pageItem));
            $page->save();

            $permAll = Permission::all();
            foreach ($permAll as $permission) {
                $page->permissions()->attach($permission->id);
                $page->save();
            }
        }

        //Create positions
        $positions = ['Admin', 'Standard User', 'Guest'];
        foreach($positions as $itemB){
            $position = new Position();

            $position->name = $itemB;
            $position->slug = strtolower(str_replace(" ","-",$itemB));
            $position->save();
        }

        $posAdmin = Position::where('slug','admin')->first();
        $pagAll = Page::all();
        foreach ($pagAll as $page)
        {
            $posAdmin->pages()->attach($page->id);
            $posAdmin->save();
        }

        $userAdmin = User::where('username','admin')->first();
        $user->positions()->attach($userAdmin->id);

        //
        $departments = ['Emergency Room', 'Surgical Complex', 'Obstetrical Complex', 'Critical Care Unit', 'Pediatric Ward', 'Medical Ward', 'Surgical Ward', 'Obstetrical High Risk', 'Obstetrical Low Risk', 'Maternal Newborn and Child Health Nutrition Department', 'Outpatient Department', 'Central Supply Room', 'Infection Prevention and Control Center', 'Nursing Service Office', 'Human Resource Office'];
        foreach($departments as $itemC){
            $department = new Department();

            $department->name = $itemC;
            $department->slug = strtolower(str_replace(" ","-",$itemC));
            $department->save();
        }



    }
}
