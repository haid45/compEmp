<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test seeding DB.
     *
     * @return void
     */
    public function testSeedingDB()
    {
        $this->seed();
        $this->assertDatabaseHas('users', ['email'=> env('INITIAL_USER_EMAIL','admin@admin.com')]);
        $this->assertDatabaseCount('companies','10');
    }
}
