<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(SchoolTableSeeder::class);
        $this->call(SchoolClassTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
    }
}
