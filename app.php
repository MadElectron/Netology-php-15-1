<?php 
    require_once 'Autoloader.php';

    $config = include(__DIR__.'/config.php');

    foreach ($config as $key => $value) {
        $$key = $value;
    }

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass, $options);

    // require_once 'main.php';


