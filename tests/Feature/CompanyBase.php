<?php

namespace Tests\Feature;

use App\Models\Company;
use Tests\TestCase;

class CompanyBase extends TestCase
{
    public function setUp():void
    {
        parent::setUp();

        $this->setBaseRoute('companies');
        $this->setBaseModel(Company::class);
    }
}
