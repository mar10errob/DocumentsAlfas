<?php

class Settings {

    private $user;
    private $password;
    private $host;
    private $database;
    private $port;

    public function __construct($database = 'documentsdb', $user = 'root', $password = '', $host = '127.0.0.1', $port = '3306') {
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @param string $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;

        return $this;
    }

    /**
     * @param string $port
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }



    public function get() {
        return [
            $this->host,
            $this->user,
            $this->password,
            $this->database,
            $this->port
        ];
    }
}
