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
            // Head Administrators 
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
                'first_name' => 'Frank', 
                'last_name' => '', 
                'email' => 'frank@gmail.com', 
                'phone' => '09171112233',
                'password' => Hash::make('12345678'),
                'remember_token' => '',
                'position' => 'IT Head',
                'roles_id' => 1, 
                'departments_id' => 1,
            ],

            // Administrators
            [
                'id' => 3, 
                'first_name' => 'Mike', 
                'last_name' => '', 
                'email' => 'mike@gmail.com', 
                'phone' => null,
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'IT',
                'roles_id' => 2, 
                'departments_id' => 1,
            ],
            [
                'id' => 4, 
                'first_name' => 'Johndel', 
                'last_name' => 'Natividad', 
                'email' => 'johndel@gmail.com', 
                'phone' => null,
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'IT',
                'roles_id' => 2, 
                'departments_id' => 1,
            ],
            [
                'id' => 5, 
                'first_name' => 'Denise', 
                'last_name' => '', 
                'email' => 'denise@gmail.com', 
                'phone' => '',
                'password' => Hash::make('12345678'), 
                'remember_token' => null,
                'position' => 'IT',
                'roles_id' => 2, 
                'departments_id' => 1,
            ],
            [
                'id' => 6, 
                'first_name' => 'Thian', 
                'last_name' => '', 
                'email' => 'thian@gmail.com', 
                'phone' => null,
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'IT',
                'roles_id' => 2, 
                'departments_id' => 1,
            ],
            [
                'id' => 7, 
                'first_name' => 'Aileen', 
                'last_name' => '', 
                'email' => 'aileen@gmail.com', 
                'phone' => null,
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'IT',
                'roles_id' => 2, 
                'departments_id' => 1,
            ],
            // Employees
            [
                'id' => 8, 
                'first_name' => 'Miguel', 
                'last_name' => 'Vargas', 
                'email' => 'miguel@gmail.com', 
                'phone' => '09176558739',
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'IT',
                'roles_id' => 4, 
                'departments_id' => 1,
            ],
            [
                'id' => 9, 
                'first_name' => 'Renz', 
                'last_name' => 'Glorioso', 
                'email' => 'renz@gmail.com', 
                'phone' => '09175446351',
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'Intern',
                'roles_id' => 4, 
                'departments_id' => 1,
            ],
            [
                'id' => 10, 
                'first_name' => 'Rochel', 
                'last_name' => 'Aguilera', 
                'email' => 'rocahel_aguilera@gmail.com', 
                'phone' => '09153345609',
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'Marketing',
                'roles_id' => 4, 
                'departments_id' => 2,
            ],
            //HR Administrators
            [
                'id' => 11, 
                'first_name' => 'HR', 
                'last_name' => 'Administrator', 
                'email' => 'hr_admin@gmail.com', 
                'phone' => '09153345619',
                'password' => Hash::make('12345678'), 
                'remember_token' => '',
                'position' => 'HR Administrator',
                'roles_id' => 3, 
                'departments_id' => 3,
            ],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
