<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $categories = [
            'Kaos Polos',
            'Kaos Sablon',
            'Hoodie',
        ];

        foreach ($categories as $categoryName) {
            Category::create(['name' => $categoryName]);
        }

        // Create sample products
        $kaosPolos = Category::where('name', 'Kaos Polos')->first();
        $kaosSablon = Category::where('name', 'Kaos Sablon')->first();
        $hoodie = Category::where('name', 'Hoodie')->first();

        Product::create([
            'category_id' => $kaosPolos->id,
            'name' => 'Kaos Polos Hitam Premium',
            'description' => 'Kaos polos berbahan cotton combed 30s yang nyaman dan berkualitas. Cocok untuk berbagai acara casual maupun formal.',
            'price' => 75000,
        ]);

        Product::create([
            'category_id' => $kaosPolos->id,
            'name' => 'Kaos Polos Putih Essential',
            'description' => 'Kaos basic berwarna putih yang wajib ada di lemari Anda. Material lembut dan tidak mudah kusut.',
            'price' => 70000,
        ]);

        Product::create([
            'category_id' => $kaosSablon->id,
            'name' => 'Kaos Sablon Grafis Modern',
            'description' => 'Kaos dengan sablon grafis keren dan modern. Sablon menggunakan teknik DTG yang awet dan tidak mudah luntur.',
            'price' => 95000,
        ]);

        Product::create([
            'category_id' => $hoodie->id,
            'name' => 'Hoodie Fleece Premium',
            'description' => 'Hoodie berbahan fleece yang hangat dan nyaman. Perfect untuk cuaca dingin atau ber-AC.',
            'price' => 175000,
        ]);

        User::factory()->create([
            'name' => 'Misuhiasu Admin',
            'email' => 'misuhiasu@gmail.com',
            'password' => bcrypt('misuhiasu123'), 
        ]);
    }
}
