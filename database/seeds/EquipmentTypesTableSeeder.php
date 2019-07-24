<?php

use Illuminate\Database\Seeder;

class EquipmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            [
                'id' => 1, 
                'type' => 'Laptop', 
            ],
            [
                'id' => 2, 
                'type' => 'Phone', 
            ],
            [
                'id' => 3, 
                'type' => 'RF Gun', 
            ],
            [
                'id' => 4, 
                'type' => 'Desktop', 
            ],
            [
                'id' => 5, 
                'type' => 'External Drive', 
            ],

        ];

        foreach ($items as $item) {
            \App\EquipmentType::create($item);
        }
    }
}
