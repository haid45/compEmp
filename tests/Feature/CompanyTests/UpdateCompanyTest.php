<?php

namespace Tests\Feature\CompanyTests;

use Illuminate\Http\UploadedFile;
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

    /**
     * @test
     * @dataProvider invalidFields
     */
    public function userCantUpdateInvalidCompany($invalidData, $invalidFields)
    {
        $table = app($this->base_model)->getTable();
        $this->signIn();

        $model = create($this->base_model);
        $this->patch(route("{$this->base_route}.update",$model->id), $invalidData)->assertSessionHasErrors($invalidFields);
        $this->assertDatabaseMissing($table,['id' => $model->id, $invalidData]);
    }
}
