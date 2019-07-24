<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
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
                'name' => 'IT Department', 
            ],
            [
                'id' => 2, 
                'name' => 'Finance Department', 
            ],
            [
                'id' => 3, 
                'name' => 'Human Resource', 
            ],
            [
                'id' => 4, 
                'name' => 'Legal Department', 
            ],
            [
                'id' => 5, 
                'name' => 'UL', 
            ],

        ];

        foreach ($items as $item) {
            \App\Department::create($item);
        }
    }
}
