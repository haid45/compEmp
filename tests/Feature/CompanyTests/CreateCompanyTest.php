<?php

namespace Tests\Feature\CompanyTests;

use Tests\Feature\CompanyBase;
use Illuminate\Http\UploadedFile;

class CreateCompanyTest extends CompanyBase
{
    /** @test */
    public function userCanCreateCompany()
    {
        $this->signIn();
        $this->create(['logo'=>UploadedFile::fake()->image('logo.jpg', config('media.company_logo.min_width'), config('media.company_logo.min_height'))]);
    }

    /** @test */
    public function guestCannotCreateCompany()
    {
        $this->create();
    }

    /** @test */
    public function companyRequiresValidation()
    {
        $this->signIn();
        $this->post(route("{$this->base_route}.store"),[])->assertSessionHasErrors('name');
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
