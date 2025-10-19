<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kaosPolos = Category::where('slug', 'kaos-polos')->first();
        $kaosSablon = Category::where('slug', 'kaos-sablon')->first();
        $hoodie = Category::where('slug', 'hoodie')->first();
        $poloShirt = Category::where('slug', 'polo-shirt')->first();

        $products = [
            // Kaos Polos
            [
                'category_id' => $kaosPolos->id,
                'name' => 'Kaos Polos Cotton Combed Navy',
                'slug' => 'kaos-polos-cotton-combed-navy',
                'description' => 'Kaos polos berbahan cotton combed 30s yang nyaman dan berkualitas. Cocok untuk aktivitas sehari-hari dengan warna navy yang elegan dan mudah dipadukan.',
                'price' => 75000,
                'is_active' => true,
            ],
            
            // Kaos Sablon
            [
                'category_id' => $kaosSablon->id,
                'name' => 'Kaos Sablon Vintage Classic',
                'slug' => 'kaos-sablon-vintage-classic',
                'description' => 'Kaos dengan desain sablon vintage yang keren dan trendy. Menggunakan teknik sablon plastisol berkualitas tinggi yang tahan lama dan tidak mudah luntur.',
                'price' => 95000,
                'is_active' => true,
            ],
        
            
            // Hoodie
            [
                'category_id' => $hoodie->id,
                'name' => 'Hoodie Premium Cotton Fleece',
                'slug' => 'hoodie-premium-cotton-fleece',
                'description' => 'Hoodie premium dengan bahan cotton fleece yang hangat dan nyaman. Dilengkapi dengan kantong depan dan tali serut yang adjustable.',
                'price' => 185000,
                'is_active' => true,
            ],
            
            // Polo Shirt
            [
                'category_id' => $poloShirt->id,
                'name' => 'Polo Shirt Cotton Pique Navy',
                'slug' => 'polo-shirt-cotton-pique-navy',
                'description' => 'Polo shirt dengan bahan cotton pique yang breathable dan nyaman. Desain klasik dengan kerah dan kancing yang rapi, cocok untuk acara semi formal.',
                'price' => 125000,
                'is_active' => true,
            ],
            
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}