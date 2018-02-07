<?php

$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "inventario";

try {
    $dbconn = new PDO('mysql:host=localhost;dbname=inventario', $username, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
