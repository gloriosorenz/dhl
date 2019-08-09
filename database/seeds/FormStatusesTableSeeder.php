<?php

use Illuminate\Database\Seeder;

class FormStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'status' => 'For Approval',],
            ['id' => 2, 'status' => 'Approved',],
            ['id' => 3, 'status' => 'Cancelled',],
            ['id' => 4, 'status' => 'Transfered',],

        ];

        foreach ($items as $item) {
            \App\FormStatus::create($item);
        }
    }
}
