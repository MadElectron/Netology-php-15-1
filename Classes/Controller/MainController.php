<?php 
    
namespace Controller;

use Db;

class MainController{
    
    private $allowedActions = ['alter', 'drop'];
    private $pdo;
    private $db;

    public function __construct__(PDO $pdo)
    {
        $db = new Db($pdo);
    }
}

    // Home database
    $host = 'localhost';
    $dbname = 'netology';
    $user = 'root';
    $pass = 'BJz5c8PI';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    ];


    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass, $options);

    

