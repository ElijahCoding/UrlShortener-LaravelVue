<?php

namespace Tests\Unit;

use App\Models\Link;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_has_many_links()
    {
        $user = factory(User::class)->create();

        $link = factory(Link::class)->create([
            'user_id' => $user->id,
        ]);

        $anotherLink = factory(Link::class)->create();

        $this->assertTrue($user->links->contains($link));
        $this->assertFalse($user->links->contains($anotherLink));
    }
}
