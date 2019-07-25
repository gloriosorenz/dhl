<?php

use Illuminate\Database\Seeder;

class AccountabilityFormsTableSeeder extends Seeder
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
                'af_num' => '791682', 
                'designation' => 'Position',
                'departments_id' => 1,
                'issued_date' => '2019-07-24',
                'request_forms_id' => null,
                'equipment_id' => 2,
                'employees_id' => 4,
                'admins_id' => 1,
                'form_statuses_id' => 2,
            ],
            [
                'id' => 2, 
                'af_num' => '879387', 
                'designation' => 'SR. HRBP Officer',
                'departments_id' => 5,
                'issued_date' => '2019-07-24',
                'request_forms_id' => null,
                'equipment_id' => 1,
                'employees_id' => 3,
                'admins_id' => 1,
                'form_statuses_id' => 1,
            ],

        ];

        foreach ($items as $item) {
            \App\AccountabilityForm::create($item);
        }
    }
}
