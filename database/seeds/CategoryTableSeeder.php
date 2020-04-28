<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Categorys
         *
         */
        $seed_categories = config('categories');
        foreach ($seed_categories as $category) {
            Category::create($category);
        }
    }
}
