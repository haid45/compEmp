<?php

namespace Tests\Feature\EmployeeTests;

use Tests\Feature\EmployeeBase;
use Illuminate\Foundation\Testing\WithFaker;

class UpdateEmployeeTest extends EmployeeBase
{
    use WithFaker;
    private array $attributes;

    public function setUp():void
    {
        parent::setUp();

        $this->attributes = [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }

    /** @test */
    public function userCanUpdateEmployee()
    {
        $this->signIn();
        $this->update($this->attributes);
    }

    /** @test */
    public function guestCannotUpdateEmployee()
    {
        $this->update($this->attributes);
    }

}
