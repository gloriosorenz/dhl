<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Head Administrator',],
            ['id' => 2, 'title' => 'Administrator',],
            ['id' => 3, 'title' => 'Employee',],
            // ['id' => 4, 'title' => 'Animal Farmer',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
