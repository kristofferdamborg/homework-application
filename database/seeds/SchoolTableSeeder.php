<?php

use Illuminate\Database\Seeder;
use App\School;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'name' => 'Sofiendalsskolen',
            'location' => 'Lange Müllers Vej 18, 9200 Aalborg SV'
        ]);

        School::create([
            'name' => 'Skipper Clement Skolen',
            'location' => 'Gammel Kærvej 30, 9000 Aalborg'
        ]);

        School::create([
            'name' => 'Sct Mariæ Skole',
            'location' => 'Valdemarsgade 14, 9000 Aalborg'
        ]);

        School::create([
            'name' => 'Vester Mariendal Skole',
            'location' => 'Stjernevej 1-5, 9000 Aalborg'
        ]);
    }
}
