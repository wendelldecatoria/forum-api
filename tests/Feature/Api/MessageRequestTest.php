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

     /** @test */
     public function creating_a_message_with_parent_id_that_belongs_to_a_different_topic_id_must_return_an_error() {
        $request = $this->json('POST', 'api/v1/messages', [
                // values based on sample test case in local env
                'topic_id'  => 21,
                'parent_id' => 4,
                'user_id'   => 1,
                'body'      => "lorem ipsum dolor sit amet"
        ])->decodeResponseJson();

        $this->assertArrayHasKey('error', $request);
     }
}
