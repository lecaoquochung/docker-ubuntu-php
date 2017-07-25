<?php
/**
 * File fuel/app/classes/controller/api/public.php
 *
 * PHP version 7
 *
 * @category  Controller_Api_Public
 * @package   Controller_Api_Public
 * @author    Le Hung <me@lehungio.com>
 * @copyright 2017 lehungio.com
 * @license   GPL_3.0 https://github.com/lecaoquochung/liho-ubun/blob/master/LICENSE
 * @version   GIT:v3.0.0
 * @link      https://github.com/lecaoquochung/liho-ubun
 */
/**
 * Class Controller_Api_Public
 *
 * @category  Controller_Api_Public
 * @package   Controller_Api_Public
 * @author    Le Hung <me@lehungio.com>
 * @copyright 2017 lehungio.com
 * @license   GPL_3.0 https://github.com/lecaoquochung/liho-ubun/blob/master/LICENSE
 * @version   Release:v3.0.0
 * @link      https://github.com/lecaoquochung/liho-ubun
 */
class Controller_Api_Public extends Controller_Rest
{
    protected $format = 'json';

    /**
    * Router
    * Public API router
    *
    * @param array $method API method
    * @param array $params API parameter
    *
    * @return data if valid token
    *
    * @access public
    * @static
    * @since  Method available since Release 3.0.0
    */
    public function router($method, $params)
    {
        $data = [];
        $token = '';
        
        if (\Input::method() === 'GET' || \Input::method() === 'POST') {
            $token = \Input::param('token');
        }
        
        // TODO validate token
        // TODO can not test success when call static class with travis
        // https://travis-ci.org/lecaoquochung/liho-ubun/builds/249350319
        // if (!LIHO::isTokenMatch($token)) {
        //     // response when invalide token
        //     $data['status'] = Config::get('ApiStatusMessageCode.invalidToken');
            
        //     return $this->response($data);
        // }

        parent::router($method, $params);
    }

    /**
    * GET Ping
    * API GET /api/v1/ping
    *
    * @return pong
    *
    * @access public
    * @static
    * @since  Method available since Release 3.0.0
    */
    public function get_ping()
    {
        $data = [];
        $token = true;

        // if (\Input::method() === 'GET' || \Input::method() === 'POST') {
        //     $token = \Input::param('token');
        // }
        
        // TODO validate token
        if ($token) {
            $data['status'] = Config::get('ApiStatusMessageCode.success');
            $data['data'] = 'pong';
        } else {
            // token required
            $data['status'] = Config::get('ApiStatusMessageCode.tokenRequiredError');
        }

        // allow header
        $this->response->set_header("Access-Control-Allow-Origin", "*");
        $this->response->set_header("Access-Control-Allow-Credentials", "true");
        $this->response->set_header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS");
        $this->response->set_header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization");

        return $this->response($data);
    }
}
