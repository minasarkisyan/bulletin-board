<?php

namespace Tests\Unit\Models\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;

class CreateTest extends TestCase
{
    use DatabaseTransactions;

    public function testNew(): void
    {


        $user = User::new($name = 'name', $email = 'email');



        self::assertNotEmpty($user);

        self::assertEquals($name, $user->name);
        self::assertEquals($email, $user->email);
        self::assertNotEmpty($user->password);

        self::assertTrue($user->isActive());
        self::assertFalse($user->isAdmin());
    }
}
