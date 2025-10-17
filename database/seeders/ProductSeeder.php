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
            [
                'category_id' => $kaosPolos->id,
                'name' => 'Kaos Polos Cotton Combed Putih',
                'slug' => 'kaos-polos-cotton-combed-putih',
                'description' => 'Kaos polos warna putih dengan bahan cotton combed premium. Desain simpel yang cocok untuk berbagai kesempatan dan mudah dikombinasikan.',
                'price' => 70000,
                'is_active' => true,
            ],
            [
                'category_id' => $kaosPolos->id,
                'name' => 'Kaos Polos Cotton Combed Hitam',
                'slug' => 'kaos-polos-cotton-combed-hitam',
                'description' => 'Kaos polos hitam dengan kualitas bahan terbaik. Warna hitam yang timeless dan cocok untuk gaya kasual maupun semi formal.',
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
            [
                'category_id' => $kaosSablon->id,
                'name' => 'Kaos Sablon Typography Modern',
                'slug' => 'kaos-sablon-typography-modern',
                'description' => 'Kaos dengan desain typography modern yang stylish. Cocok untuk anak muda yang ingin tampil beda dengan gaya yang unik dan menarik.',
                'price' => 89000,
                'is_active' => true,
            ],
            [
                'category_id' => $kaosSablon->id,
                'name' => 'Kaos Sablon Minimalist Art',
                'slug' => 'kaos-sablon-minimalist-art',
                'description' => 'Desain minimalis dengan sentuhan seni yang elegan. Sablon berkualitas tinggi dengan detail yang presisi untuk tampilan yang premium.',
                'price' => 92000,
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
            [
                'category_id' => $hoodie->id,
                'name' => 'Hoodie Zipper Urban Style',
                'slug' => 'hoodie-zipper-urban-style',
                'description' => 'Hoodie dengan zipper depan dan desain urban yang trendy. Bahan berkualitas tinggi dengan cutting yang pas di badan untuk tampilan yang stylish.',
                'price' => 210000,
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
            [
                'category_id' => $poloShirt->id,
                'name' => 'Polo Shirt Slim Fit Modern',
                'slug' => 'polo-shirt-slim-fit-modern',
                'description' => 'Polo shirt dengan cutting slim fit yang modern dan stylish. Bahan premium dengan finishing yang rapi untuk tampilan yang profesional.',
                'price' => 135000,
                'is_active' => true,
            ],
            [
                'category_id' => $poloShirt->id,
                'name' => 'Polo Shirt Striped Classic',
                'slug' => 'polo-shirt-striped-classic',
                'description' => 'Polo shirt dengan motif garis-garis klasik yang timeless. Kombinasi warna yang menarik dengan kualitas bahan yang premium dan nyaman dipakai.',
                'price' => 140000,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}