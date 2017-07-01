<?php

/**
 * @group Api
 * @group Public
 */
class Test_Controller_Api_Public extends TestCase
{
    public function test_get_ping() 
    {   
        $response = json_decode(
            Request::forge('api/v1/ping')
            ->set_method('GET')
            ->execute()
            ->response()
        );

        $this->assertEquals("pong", $response->data);
    }
}
