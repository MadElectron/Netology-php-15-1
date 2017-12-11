<?php 
    require_once __DIR__.'/../Db.php';

    // Home database
    $host = 'localhost';
    $dbname = 'netology';
    $user = 'root';
    $pass = 'BJz5c8PI';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    ];

    $allowedActions = ['alter', 'drop'];

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass, $options);

    $db = new Db($pdo);
