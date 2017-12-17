<?php 

namespace Controller;

use \Controller\Controller;

class IndexController extends Controller 
{

    public function __construct($pdo)
    {
        parent::__construct($pdo);

        $droppedTable = $_POST['drop'] ?? '';
        $renamedTable = $_POST['rename'] ?? '';
        $newName = $_POST['new_name'] ?? '';

        if ($droppedTable) {
            $this->db->dropTable($droppedTable);
        }
        if ($renamedTable && $newName) {
            $this->db->renameTable($renamedTable, $newName);    
        }
    }
}

