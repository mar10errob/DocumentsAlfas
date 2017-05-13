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



    public function __construct()
    {
        $settings = new Settings();
    // set database, hosto, user, password
        $this->connection = new Connection(
            $settings->setPort('3307')->setHost('localhost')
        );

        $this->connection = $this->connection->get();
    }


    public function all()
    {
        $queryBuild = new QueryBuilder(
            $this->database, $this->table, $this->fillabels
        );

        $data = $this->connection->query(
            $queryBuild->select(['id','nickname'])->where(['id', 'name'],[4,'Teemo'])->getQuery()
        );

        return $data->fetch_all();
    }


    public function create($collection)
    {
        $query = new QueryBuilder(
            $this->database, $this->table, $this->fillabels
        );

        return $query->insert($collection)->getQuery();
    }


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


    public function findByEmail($email)
    {
        $queryBuild = new QueryBuilder(
            $this->database, $this->table, $this->fillabels
        );

        $data = $this->connection->query(
            $queryBuild->select()->where(['email'],[$email])->getQuery()
        );

        return $data->fetch_all();
    }


    public function updateById()
    {

    }


    public function deleteById()
    {

    }

    public function getTable()
    {
        return $this->table;
    }

    public function getFillabels()
    {
        return $this->fillables;
    }
 }