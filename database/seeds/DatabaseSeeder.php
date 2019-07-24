<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(EquipmentTypesTableSeeder::class);
        $this->call(ReasonCodesTableSeeder::class);
        
        $this->call(BrandsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EquipmentTableSeeder::class);
        $this->call(AccountabilityFormsTableSeeder::class);


    }
}
