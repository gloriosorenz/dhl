<?php

use Illuminate\Database\Seeder;

class EquipmentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'status' => 'Active',],
            ['id' => 2, 'status' => 'Requested',],
            ['id' => 3, 'status' => 'Inactive',],
            // ['id' => 4, 'title' => 'Animal Farmer',],

        ];

        foreach ($items as $item) {
            \App\EquipmentStatus::create($item);
        }
    }
}
