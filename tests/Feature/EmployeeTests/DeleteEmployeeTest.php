<?php

namespace Tests\Feature\EmployeeTests;

use Tests\Feature\EmployeeBase;

class DeleteEmployeeTest extends EmployeeBase
{
    /** @test */
    public function userCanDeleteEmployee()
    {
        $this->signIn();
        $this->destroy();
    }

    /** @test */
    public function guestCannotDeleteEmployee()
    {
        $this->destroy();
    }
}
