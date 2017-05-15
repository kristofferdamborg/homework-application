<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'name' => 'Dansk',
            'school_id' => '1'
        ]);

        Subject::create([
            'name' => 'Tysk',
            'school_id' => '1'
        ]);

        Subject::create([
            'name' => 'Engelsk',
            'school_id' => '1'
        ]);

        Subject::create([
            'name' => 'Matematik',
            'school_id' => '1'
        ]);

        Subject::create([
            'name' => 'Biologi',
            'school_id' => '1'
        ]);
    }
}
