<?php

require 'connexion\views\calendrier\vendor\autoload.php';


function get_pdo(): PDO {
     $host = 'localhost:3308';
     $db   = 'tutocalendar';
     $user = 'root';
     $pass = '';
     $charset = 'utf8';
     
     $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
     $options = [
         PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::ATTR_EMULATE_PREPARES   => false,
     ];
     
     try {
          return new PDO($dsn, $user, $pass, $options);
     } catch (\PDOException $e) {
          throw new \PDOException($e->getMessage(), (int)$e->getCode());
     }
    
 }

function e404(){
     require 'connexion\views\404.php'; 
     exit();
 }

 function h(?string $value): string{
     if($value === null){
         return '';
     }
 
     return htmlentities($value);
 }
 
 
function render(string $view, $parameters = []){
     extract($parameters);
     include_once "{$view}";
 
 }
 ?>
 

