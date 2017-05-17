<?php

require_once(dirname(__FILE__). '/../Database/Settings.php');

class Connection {

    /**
     * @var mysqli
     */
    private $connection;

    function __construct(Settings $settings) {

        $settings = $settings->get();

        $this->connection = new mysqli(
            $settings[0], $settings[1], $settings[2], $settings[3], $settings[4]
        );
    }


    /**
     * @return mysqli
     */
    public function get() {
        return $this->connection;
    }
}