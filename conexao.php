<?php

$host = "localhost";
$db   = "login-pdo-procedural";
$user = "";
$pass = "";

try {
    $con = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo $e->getMessage();
}