<?php

$host = 'localhost:3306';
$base = 'professorluis';
$user = 'root';
$pass = 'la190241';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}