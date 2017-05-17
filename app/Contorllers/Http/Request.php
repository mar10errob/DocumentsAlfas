<?php
require_once(dirname(__FILE__). '/../../Contorllers/Http/Session.php');

class Request {

    /**
     * @var array
     */
    private $request = [];


    /**
     * @var array
     */
    private $server = [];


    /**
     * @var array
     */
    private $user = [];


    /**
     *
     */
    private $session;


    /**
     * Request constructor.
     * @param $request
     * @param $server
     */
    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->server = $_SERVER;
        $this->session = new Session();
    }


    /**
     * @return mixed
     */
    public function method()
    {
        return $this->server['REQUEST_METHOD'];
    }


    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        if (array_key_exists($key, $this->request)) {
            return $this->request[$key];
        }
    }


    /**
     * @return array
     */
    public function user()
    {
        if ($this->session->exists('user')) {
            $this->user = $this->session->get('user');
        } else {
            $this->user = [];
        }

        return $this->user;
    }


    /**
     * @return array
     */
    public function all()
    {
        return $this->request;
    }

}