<?php 
    
    require_once 'MainController.php';

    $tabName = $_GET['table'] ?? '';

    if(!in_array($tabName, array_column($db->showTables(),0))) {
        echo "Таблицы $tabName не существует!";
        exit;
    }

    $droppedColumn = $_POST['drop'] ?? '';
    $renamedColumn = $_POST['rename'] ?? '';
    $retypedColumn = $_POST['change_type'] ?? '';


    $newName = $_POST['new_name'] ?? '';
    $type = $_POST['type'] ?? '';
    $value = $_POST['type_value'] ?? '';
    $nullable = $_POST['nullable'] ?? '';

    if ($droppedColumn) {
        $db->dropColumn($tabName, $droppedColumn);
    }
    if ($renamedColumn && $newName) {
        $db->renameColumn($tabName, $renamedColumn, $newName);    
    }
    if ($retypedColumn) {
        $db->changeColumnType($tabName, $retypedColumn, $type, $value, $nullable);
    }
