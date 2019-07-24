<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'first_name' => 'Ram', 
                'last_name' => 'Ferrer', 
                'email' => 'admin@gmail.com', 
                'phone' => '09178398726',
                'password' => Hash::make('12345678'),
                'remember_token' => '',
                'position' => 'Project Manager',
                'roles_id' => 1, 
                'departments_id' => 1,
            ],
            [
                'id' => 2, 
                'first_name' => 'Renz', 
                'last_name' => 'Glorioso', 
                'email' => 'renz@gmail.com', 
                'phone' => '09175446351',
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'Intern',
                'roles_id' => 2, 
                'departments_id' => 1,
            ],
            [
                'id' => 3, 
                'first_name' => 'Rochel', 
                'last_name' => 'Aguilera', 
                'email' => 'rocahel_aguilera@gmail.com', 
                'phone' => '09153345609',
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'Marketing',
                'roles_id' => 2, 
                'departments_id' => 2,
            ],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
