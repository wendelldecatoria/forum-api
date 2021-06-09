<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class MessageRequestTest extends TestCase
{
     /** @test */
     public function user_request_must_return_the_correct_fields() {
        $request = $this->json('GET', 'api/v1/messages/1')->decodeResponseJson();

        $this->assertArrayHasKey('id', $request);
        $this->assertArrayHasKey('body', $request);
        $this->assertArrayHasKey('highlight', $request);
        $this->assertArrayHasKey('created_at', $request);
        $this->assertArrayHasKey('updated_at', $request);
     }
}
