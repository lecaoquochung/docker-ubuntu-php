<?php
/**
 * File fuel/app/classes/LIHO.php
 *
 * PHP Version 7
 *
 * @category  LIHO
 * @package   LIHO
 * @author    Le Hung <me@lehungio.com>
 * @copyright 2017 lehungio.com
 * @license   GPL_3.0 https://github.com/lecaoquochung/liho-ubun/blob/master/LICENSE
 * @version   GIT:v3.0.0
 * @link      https://github.com/lecaoquochung/liho-ubun
 */
/**
 * Class LIHO
 *
 * @category  LIHO
 * @package   LIHO
 * @author    Le Hung <me@lehungio.com>
 * @copyright 2017 lehungio.com
 * @license   GPL_3.0 https://github.com/lecaoquochung/liho-ubun/blob/master/LICENSE
 * @version   Release:v3.0.0
 * @link      https://github.com/lecaoquochung/liho-ubun
 */
class Liho
{
    public static function isTokenMatch($token)
    {
        // TODO decode JWT
        // $secret = Config::get('rest.ApiSecretKey');
        // $hash = Config::get('rest.HashAlgorithm');
        // $user = JWT::decode($token, $secret, $hash);
        
        // TODO check user & token match
        // No token is needed at this time so return is always true
        return true;
    }
}