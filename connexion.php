<?php

$dsn = "mysql:host=localhost;dbname=ecom";
$user = "root";
$pass = "";
try {
  $db = new PDO($dsn, $user, $pass);
} 
catch (PDOException $e) {
   die('Erreur : ' . $e->getMessage());
}
?>