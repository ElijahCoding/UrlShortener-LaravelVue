<?php

namespace Tests\Feature\Link;

use App\Models\Link;
use App\Models\User;
use Tests\TestCase;

class CreateLinkTest extends TestCase
{
    public function test_unauthenticated_user_cannot_create_link()
    {
        $this->json('POST', route('links.store'))->assertStatus(401);
    }

    public function test_authenticated_user_can_create_link()
    {
        $this->actingAs($user = factory(User::class)->create(), 'api');

        $link = factory(Link::class)->raw();

        $response = $this->json('POST', route('links.store'), $link);

        $response->assertStatus(201);
    }

    public function test_link_should_be_valid_while_creating()
    {
        $this->actingAs($user = factory(User::class)->create(), 'api');

        $link = factory(Link::class)->create();

        $this->json('POST', route('links.store'), factory(Link::class)->raw([
            'link' => 'a string'
        ]))->assertStatus(422);

        $this->json('POST', route('links.store'), factory(Link::class)->raw([
            'link' => $link->link,
        ]))->assertStatus(422);

        $this->json('POST', route('links.store'), factory(Link::class)->raw([
            'link' => null,
        ]))->assertStatus(422);
    }

    public function test_local_link_should_be_valid_while_creating()
    {
        $this->actingAs($user = factory(User::class)->create(), 'api');

        $link = factory(Link::class)->create();

        $this->json('POST', route('links.store'), factory(Link::class)->raw([
            'local_link' => 'a string'
        ]))->assertStatus(422);

        $this->json('POST', route('links.store'), factory(Link::class)->raw([
            'local_link' => $link->local_link,
        ]))->assertStatus(422);

        $this->json('POST', route('links.store'), factory(Link::class)->raw([
            'local_link' => null,
        ]))->assertStatus(422);
    }
}
