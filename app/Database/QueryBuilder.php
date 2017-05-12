<?php

class QueryBuilder
{
    private const SELECT = 'SELECT ';
    private const INSERT = 'INSERT ';
    private const UPDATE = 'UPDATE ';
    private const DELETE = 'DELETE ';

    private const ALL = '*';
    private const SET = 'SET';
    private const AND = ' AND ';
    private const INTO = ' INTO ';
    private const WHERE = ' WHERE ';
    private const VALUES = 'VALUES';
    private const FROM = ' FROM ';

    private $table;
    private $method;
    private $database;
    private $fillabels;

    private $query;

    public function __construct($database = 'documentsdb', $table = 'tablename', $fillabels = [], $method = null) {
        $this->fillabels = $fillabels;
        $this->database = $database;
        $this->method = strtoupper($method);
        $this->table = $table;
    }

    private function iterable($array = []) {

        return new CachingIterator(
            new ArrayIterator($array)
        );
    }

    private function originalMethod($name) {
        return str_replace(' ', '', $name);
    }

    private function callMethod() {
        switch ($this->method) {
            case self::originalMethod(self::SELECT):
                self::select();
                break;
            case self::originalMethod(self::INSERT):
                self::insert();
                break;
            case self::originalMethod(self::UPDATE):
                self::update();
                break;
            case self::originalMethod(self::DELETE):
                self::delete();
                break;
            default:
                return null;
                break;
        }
    }

    private function select() {
        $fillabels = self::iterable($this->fillabels);

        $queryResult = self::SELECT;

        foreach ($fillabels as $fillabel) {
            $queryResult .= ($this->table . '.' . $fillabel);

            if ($fillabels->hasNext()) {
                $queryResult .= ', ';
            }
        }

        $queryResult .= self::FROM . $this->database .'.'.$this->table;

        $this->query = $queryResult;

        return $this;
    }

    private function insert() {}

    private function update() {}

    private function delete() {}

    public function generate() {
        $this->callMethod();

        return $this;
    }

    public function getQuery() {
        return $this->query;
    }

    private function setQuotes($key) {
        return "'" . $key . "'";
    }

    public function where($keys = [], $values = []) {

        if (count($keys) != count($values)) {
            return $this;
        }

        $keys = self::iterable($keys);

        $query = $this->query . self::WHERE;

        foreach ($keys as $index => $key) {
            $query .= $key . ' = ' . self::setQuotes($values[$index]);

            if ($keys->hasNext()) {
                $query .= self::AND;
            }
        }

        $this->query = $query;

        return $this;
    }



    /**
    SELECT `users`.`id`,`users`.`name`,`users`.`nickname`,`users`.`email`,`users`.`password`
    FROM `documentsdb`.`users`;
     *
    INSERT INTO `documentsdb`.`users` (`id`,`name`,`nickname`,`email`,`password`)
    VALUES (<{id: }> ,<{name: }> ,<{nickname: }> ,<{email: }> ,<{password: }>);
     *
    INSERT INTO `documentsdb`.`users` (`name`, `nickname`, `email`, `password`) VALUES ('Marco Antonio', 'athinor', 'g.antoniotoriz@hotmail.com', 'marco123');
    UPDATE `documentsdb`.`users` SET `name`='Mar', `nickname`='Ant', `email`='g.antonriz@hotmail.com' WHERE `id`='1';
     *
    UPDATE `documentsdb`.`users`
    SET `id` = <{id: }>,`name` = <{name: }>,`nickname` = <{nickname: }>,`email` = <{email: }>,`password` = <{password: }>
    WHERE `id` = <{expr}> AND email = 'email';
     *
    DELETE FROM `documentsdb`.`users`
    WHERE <{where_expression}>;
     */

}