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

//    /** @test */
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

    /**
     * @test
     * @dataProvider invalidUpdateFields
     */
    public function userCantUpdateInvalidEmployee($invalidData, $invalidFields)
    {
        $table = app($this->base_model)->getTable();
        $this->signIn();

        $model = create($this->base_model);

        $this->patch(route("{$this->base_route}.update",$model->id), $invalidData)->assertSessionHasErrors($invalidFields);

        $this->assertDatabaseMissing($table,$invalidData);
    }
}
