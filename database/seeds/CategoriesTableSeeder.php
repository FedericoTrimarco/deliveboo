<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Primi',
            'Secondi',
            'Dolce',
            'Contorni',
            'Antipasti',
            'Bevande',
            'Vini',
            'Birre'
        ];

        foreach ($categories as $category) {
            $new_category = new Category();

            $new_category->name = $category;

            $new_category->save();
        }
    }
}
