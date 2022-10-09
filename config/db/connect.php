<?php
session_start();
    // $host = 'localhost';
    // $db = 'myregistration';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';


    $host = 'https://remotemysql.com';
    $db = 'y8ZECaDYwo';
    $user = 'y8ZECaDYwo';
    $pass = 'lYjmUjJxrV';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';

    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser('admin', 'password');
    
?>