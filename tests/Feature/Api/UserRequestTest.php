<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class UserRequestTest extends TestCase
{
     /** @test */
     public function user_request_must_return_the_correct_fields() {
        $request = $this->json('GET', 'api/v1/users/1')->decodeResponseJson();

        $this->assertArrayHasKey('id', $request);
        $this->assertArrayHasKey('name', $request);
        $this->assertArrayHasKey('email', $request);
        $this->assertArrayHasKey('nickname', $request);
        $this->assertArrayHasKey('bio', $request);
        $this->assertArrayHasKey('avatar', $request);
        $this->assertArrayHasKey('created_at', $request);
        $this->assertArrayHasKey('updated_at', $request);
     }
}
