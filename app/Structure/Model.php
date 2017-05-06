<?php

include(dirname(__FILE__). '/../Database/Connection.php');
include(dirname(__FILE__). '/../Database/Settings.php');


 abstract class Model {

     protected $table;

     protected $fillables;


     public function __construct()
     {
         $settings = new Settings();
         $connection = new Connection($settings->get());
     }

     public static function all()
     {

     }

     public static function shared()
     {

     }


     public static function create()
     {
        return "Creando...";
     }


     public static function findById()
     {

     }


     public static function updateById()
     {

     }


     public static function deleteById()
     {

     }
 }