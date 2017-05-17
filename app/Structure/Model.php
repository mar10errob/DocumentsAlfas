<?php
require_once(dirname(__FILE__). '/../Database/QueryBuilder.php');
require_once(dirname(__FILE__). '/../Database/Connection.php');
require_once(dirname(__FILE__). '/../Database/Settings.php');

abstract class Model {

    protected $database = 'documentsdb';

    /**
    * @var $table
    */
    protected $table;

    /**
    * @var $fillables
    */
    protected $fillabels;

    /**
    * @var mysqli
    */
    private $connection;

    /**
    * @var mysqli_query
    */
    private $queryBuild;


    /**
     * Model constructor.
     */
    public function __construct()
    {
        $settings = new Settings();

        // set database, hosto, user, password
        $this->connection = new Connection(
            $settings->setPort('3307')->setHost('localhost')
        );

        $this->connection = $this->connection->get();
    }


    /**
     * @return mixed
     */
    public function all()
    {
        $queryBuild = new QueryBuilder(
            $this->database, $this->table, $this->fillabels
        );

        $data = $this->connection->query(
            $queryBuild->select()->getQuery()
        );

        return $data->fetch_all();
    }


    /**
     * @param $collection
     * @return mixed
     */
    public function create($data)
    {
        $query = new QueryBuilder(
            $this->database, $this->table, $this->fillabels
        );

        $data = $this->connection->query(
            $query->insert($data)->getQuery()
        );

        return $data;

        return true;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        $query = new QueryBuilder(
            $this->database, $this->table, $this->fillabels,'SELECT'
        );

        $data = $this->connection->query(
            $query->select()->where(['id'],[$id])->getQuery()
        );

        return $data->fetch_all();
    }


    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        $queryBuilder = new QueryBuilder(
            $this->database, $this->table, $this->fillabels
        );

        $data = $this->connection->query(
            $queryBuilder->select()->where(['email'],[$email])->getQuery()
        );

        return $this->compact(
            $this->fillabels, $data->fetch_all()
        );
    }


    /**
     *
     */
    public function update()
    {

    }


    public function updateById()
    {

    }


    /**
     * @return mixed
     */
    public function delete()
    {
        $queryBuilder = new QueryBuilder(
            $this->database, $this->table, $this->fillabels
        );

        return $queryBuilder->delete()->getQuery();
    }


    /**
     * @param $id
     * @return bool
     */
    public function deleteById($id)
    {
        $queryBuilder = new QueryBuilder(
            $this->database, $this->table, $this->fillabels
        );

        return $this->connection->query(
            $queryBuilder->delete()->where(['id'],[$id])->getQuery()
        ) ?: false;
    }


    public function compact($keys = [], $values = [])
    {
        $_array = [];

        foreach ($keys as $index => $key) {
            $_array[$key] = $values[0][$index];
        }

        return $_array;
    }


    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }


    /**
     * @return mixed
     */
    public function getFillabels()
    {
        return $this->fillables;
    }
 }