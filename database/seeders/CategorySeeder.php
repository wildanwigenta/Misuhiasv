<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Kaos Polos',
                'slug' => 'kaos-polos',
            ],
            [
                'name' => 'Kaos Sablon',
                'slug' => 'kaos-sablon',
            ],
            [
                'name' => 'Hoodie',
                'slug' => 'hoodie',
            ],
            [
                'name' => 'Polo Shirt',
                'slug' => 'polo-shirt',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}