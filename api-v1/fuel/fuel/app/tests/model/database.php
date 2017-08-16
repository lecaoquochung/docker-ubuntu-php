<?php

/**
 * @group Model
 * @group Database
 */
class Test_Model_Database extends TestCase
{
    public function test_connection()
    {
        $name = "\n1. Test Database connection: ";
        $estimated_result = 0;

        $result = DB::query('SELECT COUNT(id) FROM `users`', DB::SELECT)->execute();

        print_r($name);
        print_r($result[0]["COUNT(id)"] . " row in table users");
    }
}
