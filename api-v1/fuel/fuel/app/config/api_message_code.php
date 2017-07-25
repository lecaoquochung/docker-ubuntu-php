
<?php 
/**
 * File fuel/app/config/api_message_code.php
 *
 * PHP version 7
 *
 * @category  Config
 * @package   ApiMessageCode
 * @author    Le Hung <me@lehungio.com>
 * @copyright 2017 lehungio.com
 * @license   GPL_3.0 https://github.com/lecaoquochung/liho-ubun/blob/master/LICENSE
 * @version   GIT:v3.0.0
 * @link      https://github.com/lecaoquochung/liho-ubun
 */

return [
    // request
    // 200: Success
    // 500: Internal server error
    // 400: Bad Request
    // 401: Invalid Request
    
    // message code 1: Success
    "success" => [
        "code" => 200,
        "message code" => 1,
        "message" => "Success"
    ], 

    // message code 2: Server error
    "serverError" => [
        "code" => 500,
        "message code" => 2,
        "message" => "Server error"
    ],

    // message code 3: Validation error
    "validationError" => [
        "code" => 400,
        "message code" => 3,
        "message" => "Validation error"
    ],

    // message code 4: Invalid token
    "invalidToken" => [
        "code" => 401,
        "message code" => 4,
        "message" => "Invalid token"
    ],
];
