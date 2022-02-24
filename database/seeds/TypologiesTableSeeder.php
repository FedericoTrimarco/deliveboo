<?php

use Illuminate\Database\Seeder;
use App\Typology;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = [
            'Americana',
            'Cinese',
            'Francese',
            'Giapponese',
            'Greca',
            'Italiana',
            'Tailandese',
            'Vegetariana',
            'Pesce',
            'Carne',
            'Pizza',
            'Messicano',
            'Internazionale',
        ];

        foreach($typologies as $typology) {
            $new_typology = new Typology();

            $new_typology->name = $typology;

            $new_typology->save();
        }
    }
}
