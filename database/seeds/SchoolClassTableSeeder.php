<?php

use Illuminate\Database\Seeder;
use App\SchoolClass;

class SchoolClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolClass::create([
            'name' => '6. Klasse',
            'school_id' => '1'
        ]);

        SchoolClass::create([
            'name' => '7. Klasse',
            'school_id' => '1'
        ]);

        SchoolClass::create([
            'name' => '8. Klasse',
            'school_id' => '1'
        ]);

        SchoolClass::create([
            'name' => '2. Klasse',
            'school_id' => '2'
        ]);

        SchoolClass::create([
            'name' => '4. Klasse',
            'school_id' => '2'
        ]);

        SchoolClass::create([
            'name' => '5. Klasse',
            'school_id' => '3'
        ]);
    }
}
