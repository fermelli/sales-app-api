<?php

use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = App\Category::all();
        $categories->each(function($category) {
            $subcategories = factory(App\Subcategory::class, rand(2, 4))->make();
            $category->subcategories()->saveMany($subcategories);
        });
    }
}
