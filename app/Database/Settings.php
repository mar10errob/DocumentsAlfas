<?php

class Settings {

    private $user;
    private $password;
    private $host;
    private $database;
    private $port;

    public function __construct($database = 'documentsdb', $user = 'root', $password = '', $host = '127.0.0.1', $port = '3307') {
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;
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
