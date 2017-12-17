<?php 

    namespace Controller;

    use MainController;

    $droppedTable = $_POST['drop'] ?? '';
    $renamedTable = $_POST['rename'] ?? '';
    $newName = $_POST['new_name'] ?? '';

    if ($droppedTable) {
        $db->dropTable($droppedTable);
    }
    if ($renamedTable && $newName) {
        $db->renameTable($renamedTable, $newName);    
    }