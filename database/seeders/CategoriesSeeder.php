<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Shirt",
            "Jeans",
            "Hat",
            "Sweatpants",
        ];
        
        foreach($categories as $category) {
            Category::create(['name' => $category]);
        }

    }
}
