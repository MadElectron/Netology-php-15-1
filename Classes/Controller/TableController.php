<?php 

namespace Controller;

use \Controller\Controller;

class TableController extends Controller 
{
    private $tabName;

    public function __construct($pdo)
    {
        parent::__construct($pdo);

        $this->setTabName($_GET['table'] ?? '');

        if(!in_array($this->tabName, array_column($this->db->showTables(),0))) {
            echo "Таблицы {$this->tabName} не существует!";
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
            $this->db->dropColumn($this->tabName, $droppedColumn);
        }
        if ($renamedColumn && $newName) {
            $this->db->renameColumn($this->tabName, $renamedColumn, $newName);    
        }
        if ($retypedColumn) {
            $this->db->changeColumnType($this->tabName, $retypedColumn, $type, $value, $nullable);
        }

    }

    public function getTabName()
    {
        return $this->tabName;
    }

    public function setTabName($tabName)
    {
        $this->tabName = $tabName;

        return $this;
    }

}