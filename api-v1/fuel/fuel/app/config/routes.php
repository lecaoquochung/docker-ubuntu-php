<?php
/**
 * File api-v1/fuel/app/config/routes.php
 *
 * PHP version 7
 *
 * @category  Config
 * @package   Routes
 * @author    lehungio <me@lehungio.com>
 * @copyright 2017 lehungio
 * @license   GPL_3.0 https://github.com/lecaoquochung/liho-ubun/LICENCE
 * @version   GIT: v3.0.0
 * @link      https://github.com/lecaoquochung/liho-ubun
 */
return [
    'api/v1/ping' => ['api/public/ping', 'name' => 'api_v1_ping'],
    'api/v1/user/login' => ['api/user/login', 'name' => 'api_v1_user_login'],
];
