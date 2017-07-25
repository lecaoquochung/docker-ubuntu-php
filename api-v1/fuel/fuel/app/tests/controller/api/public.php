<?php

/**
 * @group Api
 * @group Public
 */
class Test_Controller_Api_Public extends TestCase
{
    public function test_get_ping() 
    {   
        $name = "\n1. Test API-V1 ping response: ";
        $estimated_result = "pong";

        $response = json_decode(
            Request::forge('api/v1/ping')
            ->set_method('GET')
            ->execute()
            ->response()
        );

        $this->assertEquals($estimated_result, $response->data);

        return print_r($name .$response->data);
    }
}
