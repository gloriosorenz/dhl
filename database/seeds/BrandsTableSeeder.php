<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            // Laptop Brands
            [
                'id' => 1, 
                'name' => 'HP', 
                'equipment_types_id' => 1,
                // 'logo' => '/img/logos/hp.png',
            ],
            ['id' => 2, 'name' => 'Dell', 'equipment_types_id' => 1],
            ['id' => 3, 'name' => 'Asus', 'equipment_types_id' => 1],
            ['id' => 4, 'name' => 'Acer', 'equipment_types_id' => 1],
            ['id' => 5,  'name' => 'Lenovo', 'equipment_types_id' => 1],

            // Phone Brands
            ['id' => 6, 'name' => 'Samsung', 'equipment_types_id' => 2],
            ['id' => 7, 'name' => 'Apple', 'equipment_types_id' => 2],
            ['id' => 8, 'name' => 'Huawei', 'equipment_types_id' => 2],
            ['id' => 9, 'name' => 'Alcatel', 'equipment_types_id' => 2],
            ['id' => 10,  'name' => 'Oppo', 'equipment_types_id' => 2],
        ];

        foreach ($items as $item) {
            \App\Brand::create($item);
        }
    }
}

