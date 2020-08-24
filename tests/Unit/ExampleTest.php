<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
        $user = User::STATUS_ACTIVE;
        $this->assertEquals('active', $user);
    }
}
