<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CompanyBase extends TestCase
{
    public function setUp():void
    {
        parent::setUp();

        $this->setBaseRoute('companies');
        $this->setBaseModel(Company::class);
    }

    public function invalidFields(): array
    {
        return [
            [
                ['name' => ''],
                ['name']
            ],
            [
                ['name' => 'ABC Co', 'email'=> 'abc.com'],
                ['email']
            ],
            [
                ['name' => 'Abc Co', 'email' => 'admin@abc.com', 'website' => 'website'],
                ['website']
            ],
            [
                ['name' => 888, 'website' => 'https://www.website.com', 'logo' => UploadedFile::fake()->image('logo.jpg', 50, 50)],
                ['logo']
            ]
        ];
    }
}
