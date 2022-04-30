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

    /**
     * @test
     * @dataProvider invalidFields
     */
    public function userCantStoreInvalidCompany($invalidData, $invalidFields)
    {
        $table = app($this->base_model)->getTable();

        $this->signIn();
        $this->post(route("{$this->base_route}.store"), $invalidData)
            ->assertSessionHasErrors($invalidFields);

        $this->assertDatabaseCount($table, 0);
    }
}
