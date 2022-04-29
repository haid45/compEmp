<?php

namespace Tests\Feature\CompanyTests;

use Tests\Feature\CompanyBase;
use Illuminate\Foundation\Testing\WithFaker;

class UpdateCompanyTest extends CompanyBase
{
    use WithFaker;
    private array $attributes;

    public function setUp():void
    {
        parent::setUp();

        $this->attributes = [
            'name' => $this->faker->company(),
            'website' => $this->faker->url(),
        ];
    }

    /** @test */
    public function userCanUpdateCompany()
    {
        $this->signIn();
        $this->update($this->attributes);
    }

    /** @test */
    public function guestCannotUpdateCompany()
    {
        $this->update($this->attributes);
    }

}
