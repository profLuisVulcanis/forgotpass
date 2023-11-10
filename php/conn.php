<?php

$host = 'localhost:3306';
$base = 'nomedodatabase';
$user = 'usuario';
$pass = 'senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}