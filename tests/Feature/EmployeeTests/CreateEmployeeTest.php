<?php

namespace Tests\Feature\EmployeeTests;

use Tests\Feature\EmployeeBase;

class CreateEmployeeTest extends EmployeeBase
{
    /** @test */
    public function userCanCreateEmployee()
    {
        $this->signIn();
        $this->create();
    }

    /** @test */
    public function guestCannotCreateEmployee()
    {
        $this->create();
    }

    /** @test */
    public function employeeRequiresValidation()
    {
        $this->signIn();
        $this->post(route("{$this->base_route}.store"),[])->assertSessionHasErrors('first_name');
    }
}
