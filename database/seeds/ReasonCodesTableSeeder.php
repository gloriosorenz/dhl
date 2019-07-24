<?php

use Illuminate\Database\Seeder;

class ReasonCodesTableSeeder extends Seeder
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
                'code' => 'PT', 
                'reason' => 'Permanent Transfer', 
            ],
            [
                'id' => 2, 
                'code' => 'SU', 
                'reason' => 'Service Unit', 
            ],
            [
                'id' => 3, 
                'code' => 'RE', 
                'reason' => 'Resigned', 
            ],
            [
                'id' => 4, 
                'code' => 'DS', 
                'reason' => 'For Disposal', 
            ],

        ];

        foreach ($items as $item) {
            \App\ReasonCode::create($item);
        }
    }
}
