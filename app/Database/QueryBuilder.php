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
    private const VALUES = ' VALUES ';
    private const FROM = ' FROM ';

    /**
     * @var string
     */
    private $table;


    /**
     * @var string
     */
    private $method;


    /**
     * @var string
     */
    private $database;


    /**
     * @var array
     */
    private $fillabels;


    /**
     * @var
     */
    private $query;


    /**
     * QueryBuilder constructor.
     * @param string $database
     * @param string $table
     * @param array $fillabels
     * @param null $method
     */
    public function __construct($database = 'documentsdb', $table = 'tablename', $fillabels = [], $method = null) {
        $this->fillabels = $fillabels;
        $this->database = $database;
        $this->method = strtoupper($method);
        $this->table = $table;
    }


    /**
     * @param array $array
     * @return CachingIterator
     */
    private function iterable($array = []) {
        return new CachingIterator(
            new ArrayIterator($array)
        );
    }


    /**
     * @param $name
     * @return mixed
     */
    private function originalMethod($name) {
        return str_replace(' ', '', $name);
    }


    /**
     * @param $key
     * @return string
     */
    private function setQuotes($key) {
        return "'" . $key . "'";
    }


    /**
     * @return null
     */
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


    /**
     * @param null $fillabels
     * @return $this
     */
    public function select($fillabels = null) {

        $_fillabesl = $this->fillabels;

        if ($fillabels) {
            $_fillabesl = $fillabels;
        }

        $fillabels = self::iterable($_fillabesl);

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


    /**
     * @param array $request
     * @return $this
     */
    public function insert($request = []) {

        if ((count($this->fillabels) - 1) != count($request)) {
            $this->query = 'Error al generar el query';

            return $this;
        }

        $queryResult = self::INSERT . self::INTO . $this->database . '.' . $this->table;

        $fillabels = self::iterable($this->fillabels);
        $request = self::iterable($request);

        $queryResult .= ' (';

        foreach ($fillabels as $fillabel) {
            if ($fillabel != 'id') {
                $queryResult .= $fillabel;
            }

            if ($fillabels->hasNext() && $fillabel !=  'id') {
                $queryResult .= ', ';
            }
        }

        $queryResult .=  ') ' . self::VALUES . ' (';


        foreach ($request as $data) {
            $queryResult .=  $data;

            if ($request->hasNext()) {
                $queryResult .= ', ';
            }
        }

        $queryResult .= ')';

        $this->query = $queryResult;

        return $this;
    }

    public function update() {}

    public function delete() {}


    /**
     * @param array $keys
     * @param array $values
     * @return $this
     */
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
     * @return $this
     */
    public function generate() {
        $this->callMethod();

        return $this;
    }


    /**
     * @return mixed
     */
    public function getQuery() {
        return $this->query;
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