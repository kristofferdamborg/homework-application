<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Administrator of the system'
        ]);

        Role::create([
            'name' => 'school-admin',
            'display_name' => 'School Admin',
            'description' => 'Administrator of a school'
        ]);

        Role::create([
            'name' => 'teacher',
            'display_name' => 'Teacher',
            'description' => 'Teacher of a school'
        ]);

         Role::create([
            'name' => 'pupil',
            'display_name' => 'Pupil',
            'description' => 'Standard user of the system'
        ]);
    }
}
