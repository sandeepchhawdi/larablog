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
        if (Category::where('name', '=', 'Workout')->first() === null) {
            $category = Category::create([
                'name'        => 'Workout',
                'slug'        => 'workout',
                'image' => 'https://picsum.photos/1600/900/?random',
                'show_on_homepage' => 1,
                'mark_as_menu' => 1,
                'parent_id' => 0,
                'meta_description' => 'Workout Meta description'
            ]);
        }

        if (Category::where('name', '=', 'Nutrition')->first() === null) {
            $category = Category::create([
                'name'        => 'Nutrition',
                'slug'        => 'nutrition',
                'image' => 'https://picsum.photos/1600/900/?random',
                'show_on_homepage' => 1,
                'mark_as_menu' => 1,
                'parent_id' => 0,
                'meta_description' => 'Nutrition Meta description'
            ]);
        }
        
        if (Category::where('name', '=', 'Supplements')->first() === null) {
            $category = Category::create([
                'name'        => 'Supplements',
                'slug'        => 'supplements',
                'image' => 'https://picsum.photos/1600/900/?random',
                'show_on_homepage' => 1,
                'mark_as_menu' => 1,
                'parent_id' => 0,
                'meta_description' => 'Supplements Meta description'
            ]);
        }
        
        if (Category::where('name', '=', 'Whey Protein Isolate')->first() === null) {
            $category = Category::create([
                'name'        => 'Whey Protein Isolate',
                'slug'        => 'whey-protein-isolate',
                'image' => 'https://picsum.photos/1600/900/?random',
                'show_on_homepage' => 0,
                'mark_as_menu' => 1,
                'parent_id' => 3,
                'meta_description' => 'Whey Protein Isolate Meta description'
            ]);
        }
        
        if (Category::where('name', '=', 'Whey Protein')->first() === null) {
            $category = Category::create([
                'name'        => 'Whey Protein',
                'slug'        => 'whey-protein',
                'image' => 'https://picsum.photos/1600/900/?random',
                'show_on_homepage' => 0,
                'mark_as_menu' => 1,
                'parent_id' => 3,
                'meta_description' => 'Whey Protein Meta description'
            ]);
        }
    }
}
