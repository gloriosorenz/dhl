<?php

use Illuminate\Database\Seeder;

class InquiryStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'status' => 'Pending',],
            ['id' => 2, 'status' => 'Completed',],
            ['id' => 3, 'status' => 'Cancelled',],
            // ['id' => 4, 'status' => 'Transfered',],

        ];

        foreach ($items as $item) {
            \App\InquiryStatus::create($item);
        }
    }
}
