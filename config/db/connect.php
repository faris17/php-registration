<?php
    // $host = '127.0.0.1';
    // $db = 'myregistration';
    // $user = 'root';
    // $pass = '';


    $host = 'remotemysql.com';
    $db = 'myregistration';
    $user = 'y8ZECaDYwo';
    $pass = 'lYjmUjJxrV';

    $dsn = "mysql:host=$host;dbname=$db";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    require_once 'crud.php';

    $crud = new crud($pdo);
?>