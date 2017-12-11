<?php 
    
    require_once 'MainController.php';

    $tabName = $_GET['table'] ?? '';

    if(!in_array($tabName, array_column($db->showTables(),0))) {
        echo "Таблицы $tabName не существует!";
        exit;
    }

    $addColumn = $_POST['add_column'] ?? '';

    $name = $_POST['name'] ?? '';
    $type = $_POST['type'] ?? '';
    $value = $_POST['type_value'] ?? '';
    $nullable = $_POST['nullable'] ?? '';

    if ($addColumn && $name) {
        $db->addColumn($tabName, $name, $type, $value, $nullable);
        header("Location:table.php?table=$tabName");
    }
