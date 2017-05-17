<?php
require_once(dirname(__FILE__). '/../../Contorllers/Http/Session.php');
require_once(dirname(__FILE__). '/../../../app/Models/User.php');


class Authenticate
{
    /**
     * @var Session
     */
    private $session;


    /**
     * @var
     */
    private $request;


    /**
     * @var
     */
    private $user;


    /**
     * @var
     */
    private $redirect;


    /**
     * Authenticate constructor.
     */
    public function __construct($user = [])
    {
        $this->session = new Session();
        $this->user = $user;
    }


    public function isCorrectPassword(Request $request)
    {
        return $request->get('password') == $this->user['password'];
    }


    /**
     * @param array $user
     */
    public function guard()
    {
        $this->session->add('user', $this->user);
    }


    /**
     * @return bool
     */
    public function logout()
    {
        $this->session->remove('user');

        return true;
    }


    /**
     * @return null
     */
    public function user()
    {
        return $this->session->get('user');
    }
}