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

     private $connection;

     private $queryBuild;



     public function __construct() {
         // set database, hosto, user, password
         $this->connection = new Connection(
             new Settings()
         );

         $this->connection = $this->connection->get();
     }


     public function all() {

        $queryBuild = new QueryBuilder(
            $this->database, $this->table, $this->fillabels, [], 'SELECT', []
        );

        $data = $this->connection->query(
            $queryBuild->generate()->getQuery()
        );

        return $data->fetch_all();
     }


     public function create() {
         $queryBuild = new QueryBuilder(
             $this->database, $this->table, $this->fillabels, [], 'SELECT', []
         );
     }


     public function findById()
     {

     }

     public function findByEmail() {

     }


     public function updateById()
     {

     }


     public function deleteById()
     {

     }

     public function getTable() {
         return $this->table;
     }

     public function getFillabels() {
         return $this->fillables;
     }
 }