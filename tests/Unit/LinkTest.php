<?php

namespace Tests\Unit;

use App\Models\Link;
use App\Models\User;
use Tests\TestCase;

class LinkTest extends TestCase
{
    public function test_link_belongs_to_user()
    {
        $user = factory(User::class)->create();
        $anotherUser = factory(User::class)->create();

        $link = factory(Link::class)->create([
            'user_id' => $user->id,
        ]);

        $this->assertEquals($link->user->id, $user->id);
        $this->assertNotEquals($link->user->id, $anotherUser->id);
    }
}
