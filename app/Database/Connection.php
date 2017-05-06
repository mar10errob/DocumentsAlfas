<?php

class Connection {

    private $connection;

    function __construct($settings) {
        $this->connection = new mysqli($settings[0], $settings[1], $settings[2], $settings[3]);
    }

    public function get() {
        return $this->connection;
    }
}