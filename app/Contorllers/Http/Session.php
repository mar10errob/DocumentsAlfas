<?php


class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
    }


    /**
     * @param $key
     * @param $value
     */
    public function add($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }


    /**
     * @param $key
     * @return bool
     */
    public function exists($key)
    {
        if (array_key_exists($key, $_SESSION)) {
            return true;
        }

        return false;
    }


    /**
     * @param $key
     */
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }


    /**
     * @return bool
     */
    public function flush()
    {
        return session_destroy();
    }
}