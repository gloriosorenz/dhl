<?php

use Illuminate\Database\Seeder;

class EquipmentTableSeeder extends Seeder
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
                'name' => 'HP EliteBook 830 G5',
                'it_tag' => 'E0653',
                'asset_tag' => '',
                'specifications' => 'Intel Core i7-8650U CPU @ 1.90GHz 211 GHz 8.00 GB RAM HDD SSD 256',
                'serial_number' => '5CG8528R84/PHMNLWNS3126728', 
                'unit_cost' => 61567.72,
                'date_purchased' =>'2019-03-01', 
                'date_issued' =>'2019-05-14',
                'quantity' =>9,
                'brands_id' => 2, // HP
                'equipment_types_id' => 1, // Laptop
            ],
            [
                'id' => 2, 
                'name' => 'Samsung J2 Prime',
                'it_tag' => '',
                'asset_tag' => '',
                'specifications' => 'Single / Dual-SIM 1.5GB RAM 8GB internal storage, expandable up to 256GB via microSD',
                'serial_number' => '352405097168509', 
                'unit_cost' => null,
                'date_purchased' => null, 
                'date_issued' => '2019-03-01',
                'quantity' => 14,
                'plan' => '800',
                'calls' => 'Unli calls to Smart/Sun',
                'text' => 'Unli text to Smart/Sun',
                'local_calls' => 'per usage',
                'local_text' => '150 text to all networks',
                'consumable' => 'none',
                'ndd' => 'per usage',
                'idd' => 'per usage',
                'data' => '3GB',
                'roaming' => 'none',

                'brands_id' => 6, // Samsung
                'equipment_types_id' => 2, // Phone
            ],

        ];

        foreach ($items as $item) {
            \App\Equipment::create($item);
        }
    }
}
