<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Employee;
use Tests\TestCase;

class EmployeeBase extends TestCase
{
    public function setUp():void
    {
        parent::setUp();

        $this->setBaseRoute('employees');
        $this->setBaseModel(Employee::class);
    }

    public function invalidFields(): array
    {
        return [
            [
                ['first_name' => '', 'last_name' => '', 'company_id' => 1],
                ['first_name','last_name']
            ],
            [
                ['first_name' => 'Michael', 'last_name'=> ''],
                ['last_name','company_id']
            ],
            [
                ['first_name' => 'Michael', 'last_name'=> 'Jones', 'email' => 'email'],
                ['email','company_id']
            ],
            [
                ['first_name' => 'Michael', 'last_name'=> 'Jones', 'email' => 'm.jones@email.com', 'company_id' => ''],
                ['company_id']
            ]
        ];
    }

    public function invalidUpdateFields(): array
    {
        return [
            [
                ['first_name' => '', 'last_name' => ''],
                ['first_name','last_name']
            ],
            [
                ['first_name' => 'Michael', 'last_name'=> ''],
                ['last_name']
            ],
            [
                ['first_name' => 'Michael', 'last_name'=> 'Jones', 'email' => 'email'],
                ['email']
            ],
            [
                ['first_name' => 'Michael', 'last_name'=> 'Jones', 'email' => 'm.jones@email.com', 'company_id' => 0],
                ['company_id']
            ]
        ];
    }
}
