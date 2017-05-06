<?php

include(dirname(__FILE__). '/../Database/Connection.php');
include(dirname(__FILE__). '/../Database/Settings.php');


 abstract class Model {

     /**
      * @var $table
      */
     protected $table;


     /**
      * @var $fillables
      */
     protected $fillables;



     public function __construct()
     {

     }


     public function all()
     {

     }


     public function shared()
     {

     }


     public function create()
     {

     }


     public function findById()
     {

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