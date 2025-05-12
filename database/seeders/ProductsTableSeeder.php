<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
// database/seeders/ProductsTableSeeder.php
public function run(): void
{
    // Сначала создаем размеры
    $sizes = [
        ['name' => 'S', 'type' => 'clothes'],
        ['name' => 'M', 'type' => 'clothes'],
        ['name' => 'L', 'type' => 'clothes'],
        ['name' => 'XL', 'type' => 'clothes'],
        ['name' => '42', 'type' => 'shoes'],
        ['name' => '43', 'type' => 'shoes'],
        ['name' => '44', 'type' => 'shoes'],
    ];
    
    DB::table('sizes')->insert($sizes);

    // Создаем продукты
    $products = [
        [
            'name' => 'Куртка redfox',
            'price' => 10900,
            'description' => 'Куртка спортивного дизайна из трехслойного материала Softshell с мембраной 10 000 мм и водоотталкивающей пропиткой.',
            'image' => 'https://i.ibb.co/dwtrJZ3K/redfox-no-bg-preview-carve-photos-1.png',
            'in_stock' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        
        [
            'name' => ' Кроссовки salomon мужские',
            'price' => 8700,
            'description' => 'Система пластиковых «крыльев» по бокам верха обуви. Поддерживает стопу,
               защищает от пронации и супинации, исключает растягивание верха обуви в 
               сырую погоду и увеличивает срок её службы.
                Водостойкая, ветрозащитная и паропроницаемая мембрана. Микропористая структура не 
                пропускает капли воды снаружи, в то время как молекулы пота свободно выводятся 
                сквозь мембрану. ',
            'image' => 'https://i.ibb.co/zWFg80MV/salomon-2-no-bg-preview-carve-photos.png',
            'in_stock' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ];

    $productIds = DB::table('products')->insert($products);

    // Привязываем размеры к товарам
    $jacketSizes = [
        ['product_id' => 1, 'size_id' => 1, 'quantity' => 5], // S
        ['product_id' => 1, 'size_id' => 2, 'quantity' => 10], // M
        ['product_id' => 1, 'size_id' => 3, 'quantity' => 7],  // L
    ];

    DB::table('product_size')->insert($jacketSizes);
}
}