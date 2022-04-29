<?php

namespace Tests\Feature;

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
}
