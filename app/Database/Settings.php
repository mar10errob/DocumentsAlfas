<?php

class Settings {

    private $user;
    private $password;
    private $host;
    private $database;

    public function __construct($database = 'documentsdb', $user = 'root', $password = '', $host = '127.0.0.1') {
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
    }

    public function get() {
        return [
            $this->host,
            $this->user,
            $this->password,
            $this->database
        ];
    }
}
