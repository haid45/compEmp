<?php

namespace Tests\Feature\CompanyTests;

use Tests\Feature\CompanyBase;

class DeleteCompanyTest extends CompanyBase
{
    /** @test */
    public function userCanDeleteCompany()
    {
        $this->signIn();
        $this->destroy();
    }

    /** @test */
    public function guestCannotDeleteCompany()
    {
        $this->destroy();
    }
}
