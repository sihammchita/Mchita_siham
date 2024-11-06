<?php
// db.php

$host = 'localhost'; //
$dbname = 'streaming'; // 
$username = 'root'; //
$password = ''; //

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec de la connexion : ' . $e->getMessage();
}
