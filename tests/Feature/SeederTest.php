<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeederTest extends TestCase
{
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
