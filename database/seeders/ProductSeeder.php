<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder {
    public function run(): void {
        $products = [
            ['name' => 'Black&Decker A7062 40 Parça Cırcırlı Tornavida Seti', 'category' => 'El Aletleri', 'price' => 120.75, 'stock' => 10],
            ['name' => 'Reko Mini Tamir Hassas Tornavida Seti 32\'li', 'category' => 'El Aletleri', 'price' => 49.50, 'stock' => 10],
            ['name' => 'Viko Karre Anahtar - Beyaz', 'category' => 'Elektrik Malzemeleri', 'price' => 11.28, 'stock' => 10],
            ['name' => 'Legrand Salbei Anahtar, Alüminyum', 'category' => 'Elektrik Malzemeleri', 'price' => 22.80, 'stock' => 10],
            ['name' => 'Schneider Asfora Beyaz Komütatör', 'category' => 'Elektrik Malzemeleri', 'price' => 12.95, 'stock' => 10],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->first();
            if ($category) {
                Product::create([
                    'name' => $product['name'],
                    'category' => $category->id,
                    'price' => $product['price'],
                    'stock' => $product['stock']
                ]);
            }
        }
    }
}
